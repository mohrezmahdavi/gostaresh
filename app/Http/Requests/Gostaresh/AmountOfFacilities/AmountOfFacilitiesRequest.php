<?php

namespace App\Http\Requests\Gostaresh\AmountOfFacilities;

use Illuminate\Foundation\Http\FormRequest;

// Table 38 request
class AmountOfFacilitiesRequest extends FormRequest
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
            'country_id' => 'nullable|numeric|gte:0',
            'province_id'=> 'required|numeric|gte:0',
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'required',
            'amount' => 'required|numeric|gte:0',
            'year' => 'required|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
