<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['status'] = 'active';
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/home');
        } else {
            return back()->with('message', 'You Blocked by Admin!!!');
        }
    }
}
