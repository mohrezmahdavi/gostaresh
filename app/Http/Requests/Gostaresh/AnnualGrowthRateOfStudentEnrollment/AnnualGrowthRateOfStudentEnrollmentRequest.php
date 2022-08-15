<?php

namespace App\Http\Requests\Gostaresh\AnnualGrowthRateOfStudentEnrollment;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

class AnnualGrowthRateOfStudentEnrollmentRequest extends FormRequest
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
            "gender_id" => ['required', 'numeric', new DecimalRangeRule()],
            "university_type" => ['required', 'numeric', new DecimalRangeRule()],
            "grade_id" => ['required', 'numeric', new DecimalRangeRule()],
            'department_of_education' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "annual_growth_rate_of_student_enrollment" => ['required', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
