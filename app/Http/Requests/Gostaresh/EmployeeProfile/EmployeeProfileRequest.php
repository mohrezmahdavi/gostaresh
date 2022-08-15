<?php

namespace App\Http\Requests\Gostaresh\EmployeeProfile;

use Illuminate\Foundation\Http\FormRequest;

// Table 45 request
class EmployeeProfileRequest extends FormRequest
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
            'province_id'=> 'nullable|numeric|gte:0',
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'higher_education_subsystems' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_non_faculty_staff' => 'required|numeric|gte:0|lte:2147483647',
            'average_age_of_employees' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_male_employees' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_female_employees' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_administrative_staff' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_training_staff' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_research_staff' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_PhD_staff' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_master_staff' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_expert_staff' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_diploma_and_sub_diploma_employees' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_employees_studying' => 'required|numeric|gte:0|lte:2147483647',
            'growth_rate' => 'required|numeric',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
