<?php

namespace App\Http\Requests\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmitted;

use Illuminate\Foundation\Http\FormRequest;

class AverageTestScoreOfTheLastFivePercentOfAdmittedRequest extends FormRequest
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
            "average_test_score_of_the_last_five_percent_of_admitted" => 'required|integer|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
