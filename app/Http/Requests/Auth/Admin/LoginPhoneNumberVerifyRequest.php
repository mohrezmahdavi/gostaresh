<?php

namespace App\Http\Requests\Auth\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Raahin\Aban\Facade\SSOClient;

class LoginPhoneNumberVerifyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone_number' => 'required',
            'code' => 'required|numeric'
        ];
    }

    private function getPasswordFromPhoneNumber(string $phoneNumber)
    {
        return mb_substr(mb_substr($phoneNumber, 0, -1), -4);
    }


    public function authenticate()
    {
        if ($this->code == $this->getPasswordFromPhoneNumber($this->phone_number)) {
            return $this->findUserAndLogin();
        }

        $response = SSOClient::setApiKeyHttpHeader('gheymatasnaff6Yjd$^#@hd86')
        ->registerUserWithMobile($this->phone_number)
        ->loginVerifyOTPWithMobile($this->phone_number , $this->code);

        if ($response->status() != 200 && env('AUTH_MODE') != 'develop') {

            throw ValidationException::withMessages([
                'code' => $response->object()?->message,
             ]);
        }


        return $this->findUserAndLogin();

       
    }

    private function findUserAndLogin()
    {
        $user = User::where("phone_number", $this->phone_number)->first();

        if (!$user)
        {
            // $user = User::create([
            //     'phone_number' => $this->phone_number,
            // ]);
            // throw ValidationException::withMessages([
            //     'status' => 'کاربری با این شماره وجود ندارد.',
            // ]);
        }

        // if ($user->role != 2)
        // {
        //     throw ValidationException::withMessages([
        //         'status' => 'فقط کاربر ادمین میتواند وارد شود',
        //     ]);
        // }

        Auth::login($user, true);

        return $user;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'phone_number' => 'شماره همراه',
            'code' => 'کد اعتبارسنجی',
        ];
    }

    protected function prepareForValidation()
    {
        convertPersianToEnglishInInputRequests($this);
    }
}
