<?php

namespace App\Http\Requests\Gostaresh\GrowthRateStudentPopulation;

use Illuminate\Foundation\Http\FormRequest;

class GrowthRateStudentPopulationRequest extends FormRequest
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
            'gender_id' => 'required|numeric',
            'ebtedai' => 'required|numeric',
            'motevasete_1' => 'required|numeric',
            'motevasete_2_ensani' => 'required|numeric',
            'motevasete_2_math' => 'required|numeric',
            'motevasete_2_science' => 'required|numeric',
            'motevasete_2_kar_danesh' => 'required|numeric',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
