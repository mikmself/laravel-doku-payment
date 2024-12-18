<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth.login');
    }
    public function registerPage()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                session()->flash('success', 'Welcome back, ' . Auth::user()->name . '!');
                return redirect()->intended('/');
            } else {
                throw ValidationException::withMessages([
                    'email' => 'Email atau password salah.',
                ]);
            }
        } catch (ValidationException $e) {
            session()->flash('error', 'Login Failed: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $e) {
            session()->flash('error', 'Unexpected Error: Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        if($validator->fails()){
            session()->flash('error', $validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::beginTransaction();
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
            ]);
            DB::commit();
            session()->flash('success', 'Your account has been created successfully.');
            return redirect()->route('login');
        } catch (\Throwable $e) {
            DB::rollBack();
            session()->flash('error', 'Registration Failed: Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            session()->flash('success', 'You have been successfully logged out.');
            return redirect()->route('login');
        } catch (\Throwable $e) {
            session()->flash('error', 'Logout Failed: Something went wrong. Please try again.');
            return redirect()->back();
        }
    }
}
