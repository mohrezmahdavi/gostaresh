<?php

namespace App\Http\Requests\Gostaresh\DemographicChangesOfCity;

use Illuminate\Foundation\Http\FormRequest;

class DemographicChangesOfCityRequest extends FormRequest
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
            'county_id'=> 'required|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'population' => 'required|integer|gte:0',
            'immigration_rates' => 'required|numeric',
            'growth_rate' => 'required|numeric',
            'year' => 'required|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
