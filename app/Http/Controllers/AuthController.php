<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function loginPage(){
        return view('auth.login');
    }
    public function registerPage(){
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
                Alert::success('Login Success', 'Welcome back, ' . Auth::user()->name . '!');
                return redirect()->intended('/dashboard');
            } else {
                throw ValidationException::withMessages([
                    'email' => 'Email atau password salah.',
                ]);
            }
        } catch (ValidationException $e) {
            Alert::error('Login Failed', $e->getMessage());
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $e) {
            // Penanganan untuk kesalahan lainnya
            Alert::error('Unexpected Error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ]);
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => "user",
            ]);
            DB::commit();
            Alert::success('Registration Successful', 'Welcome, ' . $user->name . '! Please login to continue.');
            return redirect()->route('login');
        } catch (ValidationException $e) {
            Alert::error('Registration Failed', 'Please check the form and try again.');
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $e) {
            DB::rollBack();
            Alert::error('Unexpected Error', 'Something went wrong. Please try again.');
            return redirect()->back()->withInput();
        }
    }
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::success('Logged Out', 'You have been successfully logged out.');
            return redirect()->route('login');
        } catch (\Throwable $e) {
            Alert::error('Logout Failed', 'Something went wrong. Please try again.');
            return redirect()->back();
        }
    }
}
