<?php

namespace App\Http\Requests\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

class AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest extends FormRequest
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
            "gender_id" => 'required|numeric',
            "university_type" => 'required|numeric',
            "grade_id" => 'required|numeric',
            'department_of_education' => 'required|numeric|gte:0',
            "average_test_score_of_the_first_thirty_percent_of_admitted" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
