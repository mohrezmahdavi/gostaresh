<?php

namespace App\Http\Requests\Gostaresh\AssetProductivity;

use Illuminate\Foundation\Http\FormRequest;

// Table 47 request
class AssetProductivityRequest extends FormRequest
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
            'office_space_utilization_rate' => 'required|between:-99.99,99.99',
            'utilization_rate_of_educational_equipment' => 'required|between:-99.99,99.99',
            'utilization_rate_of_technology_equipment' => 'required|between:-99.99,99.99',
            'utilization_rate_of_cultural_equipment' => 'required|between:-99.99,99.99',
            'utilization_rate_of_sports_equipment' => 'required|between:-99.99,99.99',
            'operation_rate_of_agricultural_equipment' => 'required|between:-99.99,99.99',
            'operation_rate_of_workshop_equipment' => 'required|between:-99.99,99.99',
            'faculty_capacity_utilization_rate' => 'required|between:-99.99,99.99',
            'employee_capacity_utilization_rate' => 'required|between:-99.99,99.99',
            'graduate_capacity_utilization_rate' => 'required|between:-99.99,99.99',
            'student_capacity_utilization_rate' => 'required|between:-99.99,99.99',
            'ratio_of_faculty_members_to_students' => 'required|between:-99.99,99.99',
            'ratio_of_staff_to_students' => 'required|between:-99.99,99.99',
            'ratio_of_faculty_members_to_teaching_professors' => 'required|between:-99.99,99.99',
            'ratio_of_faculty_members_to_employees' => 'required|between:-99.99,99.99',
            'ratio_of_unit_faculty_members_to_faculty_members_of_the_province' => 'required|between:-99.99,99.99',
            'ratio_of_unit_students_to_students_of_the_province' => 'required|between:-99.99,99.99',
            'ratio_of_unit_employees_to_provincial_employees' => 'required|between:-99.99,99.99',
            'unit_teaching_professors_to_teaching_professors_province' => 'required|between:-99.99,99.99',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
