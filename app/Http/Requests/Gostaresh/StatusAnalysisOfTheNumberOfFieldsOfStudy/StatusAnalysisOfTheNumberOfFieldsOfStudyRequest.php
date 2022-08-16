<?php

namespace App\Http\Requests\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudy;

use App\Rules\DecimalRangeRule;
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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'nullable|max:255',
            "total_number_of_fields_of_study" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_international_courses" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_virtual_courses" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_technical_disciplines" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_newly_established_courses" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_courses_not_accepted" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_courses_without_volunteers" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_GDP_courses" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_disciplines_corresponding_to_job_fields" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_fields_corresponding_to_the_specified_specialties" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_courses_offered_virtually" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_popular_fields_more_than_eighty_percent_capacity" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_courses_with_low_audience" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_fields_of_less_than_5_people" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_courses_without_admission" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_popular_fields" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "low_number_of_applicants" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
