<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }
    public function create()
    {
        return view('admin.user.create');
    }

    public function update()
    {
        return view('admin.user.user-update');
    }
}
