<?php

namespace App\Http\Controllers\Auth\Username;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginUsernameRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;


class DoLoginController extends Controller
{
    private $user;

    public function doLogin(LoginUsernameRequest $request)
    {
        $this->user = User::where('username', $request->username)->first();
        if (Hash::check((string)$request->password, $this->user->password)) {
            return $this->isLoginSuccess($request);
        }
        return $this->sendResponseUnsuccessful();
    }

    private function sendResponseUnsuccessful()
    {
        return redirect()->back()->with('Unsuccessful', 'رمز عبور خود را اشتباه وارد کردید.');
    }

    private function isLoginSuccess(Request $request)
    {
        Auth::login($this->user);
        if ($request->next) {
            return redirect($request->next);
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
