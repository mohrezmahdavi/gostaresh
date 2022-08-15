<?php

namespace App\Http\Requests\Gostaresh\RevenueStatusAnalysis;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 48 request
class RevenueStatusAnalysisRequest extends FormRequest
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
            'total_revenue' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'income_from_student_tuition' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'income_from_commercialized_technologies' => ['required', 'numeric', new DecimalRangeRule()],
            'income_from_research_activities' => ['required', 'numeric', new DecimalRangeRule()],
            'income_from_skills_training' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'operating_income_growth_rate' => ['required', 'numeric', new DecimalRangeRule()],
            'total_non_tuition_income' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'total_international_income' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'shareholder_income' => ['required', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
