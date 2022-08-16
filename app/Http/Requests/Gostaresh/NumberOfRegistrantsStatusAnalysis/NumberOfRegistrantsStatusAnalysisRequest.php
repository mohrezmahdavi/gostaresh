<?php

namespace App\Http\Requests\Gostaresh\NumberOfRegistrantsStatusAnalysis;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

class NumberOfRegistrantsStatusAnalysisRequest extends FormRequest
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
            "gender_id" => 'nullable|numeric',
            "university_type" => 'nullable|numeric',
            "number_of_registrants" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "grade_id" => 'nullable|numeric',
            'department_of_education' => 'nullable|numeric|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
