<?php

namespace App\Http\Requests\Gostaresh\DemographicChangesOfCity;

use App\Rules\DecimalRangeRule;
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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'population' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'immigration_rates' => ['nullable', 'numeric', new DecimalRangeRule()],
            'growth_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
