<?php

namespace App\Http\Requests\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudy;

use Illuminate\Foundation\Http\FormRequest;

class StatusAnalysisOfTheNumberOfFieldsOfStudyRequest extends FormRequest
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
            "total_number_of_fields_of_study" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_international_courses" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_virtual_courses" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_technical_disciplines" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_newly_established_courses" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_courses_not_accepted" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_courses_without_volunteers" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_GDP_courses" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_disciplines_corresponding_to_job_fields" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_fields_corresponding_to_the_specified_specialties" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_courses_offered_virtually" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_popular_fields_more_than_eighty_percent_capacity" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_courses_with_low_audience" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_fields_of_less_than_5_people" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_courses_without_admission" => 'required|numeric|gte:0|lte:2147483647',
            "number_of_popular_fields" => 'required|numeric|gte:0|lte:2147483647',
            "low_number_of_applicants" => 'required|numeric|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
