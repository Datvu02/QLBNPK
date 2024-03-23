<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    
    // Xử lý yêu cầu đăng nhập
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard');
        } else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }

    // Xử lý yêu cầu đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/');
    }
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Xử lý yêu cầu đăng ký
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Thực hiện đăng nhập ngay sau khi đăng ký (tuỳ chọn)
        // Auth::login($user);

        return redirect('/login')->with('success', 'Your account has been registered. You can now log in.');
    }
}
