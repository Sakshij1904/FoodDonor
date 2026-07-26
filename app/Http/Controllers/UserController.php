<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Register Page
    public function register()
    {
        return view('register');
    }

    // Save Register

    public function saveRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registration Successful');
    }

    // Login Page
    public function login()
    {
        return view('login');
    }

    // Check Login
    public function checkLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            Session::put('user', $user->id);
            Session::put('name', $user->name);

            return redirect('/');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    // Logout
    public function logout()
    {
        Session::flush();

        return redirect('/login');
    }
}