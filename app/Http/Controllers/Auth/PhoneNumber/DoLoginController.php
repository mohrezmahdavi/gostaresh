<?php

namespace App\Http\Controllers\Auth\PhoneNumber;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginPhoneNumberRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DoLoginController extends Controller
{
    public function doLogin(LoginPhoneNumberRequest $request)
    {
        $request->sendCode();
        Log::info("User open Logged in PhoneNumber", ['ip' => \request()->ip()]);
        session([
            'login_phone_number' => $request->phone_number,
            'login_next' => $request->next
        ]);
        return redirect()->route('show.do.login.phone');
    }

    public function showDoLoginPage(Request $request)
    {
        if(!session()->has('login_phone_number'))
        {
            return redirect()->route('login.phone');
        }
        $phone_number = session('login_phone_number');
        $next_page = session('login_next');
        return view('auth.auth-phone-number.do-login')->with('phone_number', $phone_number)->with('next',$next_page);
    }

}
