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
            'unit' => 'required|max:255',
            'total_graduates' => 'required|numeric|gte:0|lte:2147483647',
            'employed_graduates' => 'required|numeric|gte:0|lte:2147483647',
            'graduate_growth_rate' => 'required|numeric|between:-99.99,99.99',
            'related_employed_graduates' => 'required|numeric|gte:0|lte:2147483647',
            'skill_certification_graduates' => 'required|numeric|gte:0|lte:2147483647',
            'employed_graduates_6_months_after_graduation' => 'required|numeric|gte:0|lte:2147483647',
            'average_monthly_income_employed_graduates' => 'required|numeric|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
