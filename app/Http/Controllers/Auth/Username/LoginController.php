<?php

namespace App\Http\Controllers\Auth\Username;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.username.login');
    }
}
