<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('user.register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:64',
            'phone' => 'required|numeric|digits:10|unique:users',
            'email' => 'required|email|unique:users|max:64',
            'password'              => 'required|confirmed|min:6|max:32',
            'password_confirmation' => 'required',
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        return redirect()->route('event.list');
    }
    public function authlogin(Request $request)
    {
        return view('user.login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'User' || $user->role === 'Admin') {
                return redirect()->route('event.list');
            }
            Auth::logout();
            return redirect()->route('user.login')->with('error', 'Access denied.');
        }

        return redirect()->route('user.login')->with('error', 'Invalid email or password.');
    }

    public function userlogout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('user.login');
    }

}
