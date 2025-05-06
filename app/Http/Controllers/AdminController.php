<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home()
    {

        return view('admin.dashboad',[

        ]);
    }
    public function login()
    {
        return view('admin.login');
    }
    public function checkLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                Auth::logout();
                return redirect()->route('admins.login')->with('error', 'Access denied.');
            }
        }
        return redirect()->route('admins.login')->with('error', 'Invalid credentials.');
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('admins.login');
    }
}
