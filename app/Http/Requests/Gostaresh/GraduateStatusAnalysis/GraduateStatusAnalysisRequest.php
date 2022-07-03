<?php

namespace App\Http\Requests\Gostaresh\GraduateStatusAnalysis;

use Illuminate\Foundation\Http\FormRequest;

// Table 33 request
class GraduateStatusAnalysisRequest extends FormRequest
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
            'unit' => 'required',
            'total_graduates' => 'required|numeric|gte:0',
            'employed_graduates' => 'required|numeric|gte:0',
            'graduate_growth_rate' => 'required|numeric|gte:0',
            'related_employed_graduates' => 'required|numeric|gte:0',
            'skill_certification_graduates' => 'required|numeric|gte:0',
            'employed_graduates_6_months_after_graduation' => 'required|numeric|gte:0',
            'average_monthly_income_employed_graduates' => 'required|numeric|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
