<?php

namespace App\Http\Requests;

use App\Rules\StringWithoutNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserProfileRequest extends FormRequest
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
            'first_name' => ['string', 'required', new StringWithoutNumberRule],
            'last_name' => ['string', 'required', new StringWithoutNumberRule],
            'phone_number' => 'required|regex:/(09)[0-9]{9}/|digits:11|numeric|unique:users,phone_number,' . Auth::id() . ',id',
            'country_id' => 'numeric|nullable',
            'province_id' => 'numeric|nullable',
            'county_id' => 'numeric|nullable',
            'city_id' => 'numeric|nullable',
            'rural_district_id' => 'numeric|nullable',
            'address' => 'string|nullable',
            'status' => 'numeric|nullable',
            'user_picture' => 'nullable|mimes:png,jpg,jpeg',
        ];
    }
}
