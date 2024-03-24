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
        // Validate incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255|in:male,female,other',
            'birth_date' => 'required|date',
            'id_card' => 'required|string|max:255',
            'role' => 'required|string|in:doctor,staff,patient',
            'occupation' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'agree' => 'required',
            // Add validation rules for other fields
        ]);

        // Create new user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->address = $validatedData['address'];
        $user->gender = $validatedData['gender'];
        $user->birth_date = $validatedData['birth_date'];
        $user->id_card = $validatedData['id_card'];
        $user->role = $validatedData['role'];
        $user->occupation = $validatedData['occupation'];
        $user->phone_number = $validatedData['phone_number'];
        $user->certificate = $request->input('certificate'); // This field might be empty
        $user->specialization = $request->input('specialization'); // This field might be empty

        $user->save();

        // You may perform additional actions after user registration, such as sending email verification, etc.

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
