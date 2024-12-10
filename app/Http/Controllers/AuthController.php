<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
