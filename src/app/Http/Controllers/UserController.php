<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function register()
    {
        return view('user.register');
    }

    public function authentificate(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'password' => 'required'
        ]);

       // Action

        return redirect()->route('home');
    }

    public function create(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'name' => 'required',
            'password1' => 'required',
            'password2' => 'required'
        ]);

       // Action

        return redirect()->route('home');
    }
}
