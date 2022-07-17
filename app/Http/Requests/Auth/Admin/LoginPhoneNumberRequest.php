<?php

namespace App\Http\Requests\Auth\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Raahin\Aban\Facade\SSOClient;

class LoginPhoneNumberRequest extends FormRequest
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

    public function sendCode()
    {
        $response = SSOClient::setApiKeyHttpHeader('gheymatasnaff6Yjd$^#@hd86')
            ->registerUserWithMobile($this->phone_number)
            ->loginGenerateOTPWithMobile($this->phone_number);

        if ($response->status() != 200 && env('AUTH_MODE') != 'develop') {

            throw ValidationException::withMessages([
                'code' => $response->object()?->message,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'phone_number' => ['required', 'regex:/(09)[0-9]{9}/', 'digits:11', 'numeric'],
        ];
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
        ];
    }


    protected function prepareForValidation()
    {
        convertPersianToEnglishInInputRequests($this);
    }
}
