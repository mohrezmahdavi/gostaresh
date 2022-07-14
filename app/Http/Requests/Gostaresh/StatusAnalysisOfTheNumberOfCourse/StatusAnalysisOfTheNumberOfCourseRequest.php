<?php

namespace App\Http\Requests\Gostaresh\StatusAnalysisOfTheNumberOfCourse;

use Illuminate\Foundation\Http\FormRequest;

class StatusAnalysisOfTheNumberOfCourseRequest extends FormRequest
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
            "total_number_of_courses" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_international_Persian_language_courses_in_person" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_international_virtual_Persian_language_courses" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_international_courses_in_the_target_language_in_person" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_international_courses_in_the_target_language_virtually" => 'required|numeric|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
