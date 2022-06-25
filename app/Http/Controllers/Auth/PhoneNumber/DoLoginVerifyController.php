<?php

namespace App\Http\Controllers\Auth\PhoneNumber;

use App\Events\NewUserNotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Admin\LoginPhoneNumberVerifyRequest;
use App\Http\Requests\Auth\Samt\DoRegisterFormDataRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;

class DoLoginVerifyController extends Controller
{
    public function doLoginVerify(LoginPhoneNumberVerifyRequest $request)
    {
        $result = $request->authenticate();
        session()->forget(['login_phone_number', 'login_next']);

        if($request->next){
            return redirect($request->next);
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    

    
}
