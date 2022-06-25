<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'phone_number' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,phone_number,' . $this->user->id . ',id',
            'country_id' => 'numeric|nullable',
            'province_id' => 'numeric|nullable',
            'county_id' => 'numeric|nullable',
            'city' => 'numeric|nullable',
            'rural_district_id' => 'numeric|nullable',
            'address' => 'string|nullable',
            'status' => 'numeric|nullable',
            'user_picture' => 'nullable|image',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        convertPersianToEnglishInInputRequests($this);
    }
}