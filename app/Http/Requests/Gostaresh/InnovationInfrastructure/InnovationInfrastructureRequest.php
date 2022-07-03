<?php

namespace App\Http\Requests\Gostaresh\InnovationInfrastructure;

use Illuminate\Foundation\Http\FormRequest;

// Table 39 request
class InnovationInfrastructureRequest extends FormRequest
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
            'number_of_active_innovation_houses' => 'required|numeric|gte:0',
            'number_of_active_accelerators' => 'required|numeric|gte:0',
            'number_of_active_growth_centers' => 'required|numeric|gte:0',
            'number_of_active_technology_cores' => 'required|numeric|gte:0',
            'number_of_active_skill_high_schools' => 'required|numeric|gte:0',
            'number_of_skill_training_centers' => 'required|numeric|gte:0',
            'number_of_research_centers' => 'required|numeric|gte:0',
            'number_of_development_offices' => 'required|numeric|gte:0',
            'number_of_industry_trade_offices' => 'required|numeric|gte:0',
            'number_of_entrepreneurship_centers' => 'required|numeric|gte:0',
            'year' => 'required|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
