<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function CekStatus()
    {
    
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        if (Auth::user()->status === 'admin') {
            return redirect()->route('dashboard');
        }
        if (Auth::user()->status === 'user') {
            return redirect()->route('user.dashboard');
        }
    }
}
