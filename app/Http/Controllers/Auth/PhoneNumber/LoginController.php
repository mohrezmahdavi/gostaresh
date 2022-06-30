<?php

namespace App\Http\Controllers\Auth\PhoneNumber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        session()->forget(['login_phone_number', 'login_next']);
        return view('auth.auth-phone-number.login');
    }
}
