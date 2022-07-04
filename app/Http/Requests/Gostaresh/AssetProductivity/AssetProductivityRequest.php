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
            'office_space_utilization_rate' => 'required|numeric',
            'utilization_rate_of_educational_equipment' => 'required|numeric',
            'utilization_rate_of_technology_equipment' => 'required|numeric',
            'utilization_rate_of_cultural_equipment' => 'required|numeric',
            'utilization_rate_of_sports_equipment' => 'required|numeric',
            'operation_rate_of_agricultural_equipment' => 'required|numeric',
            'operation_rate_of_workshop_equipment' => 'required|numeric',
            'faculty_capacity_utilization_rate' => 'required|numeric',
            'employee_capacity_utilization_rate' => 'required|numeric',
            'graduate_capacity_utilization_rate' => 'required|numeric',
            'student_capacity_utilization_rate' => 'required|numeric',
            'ratio_of_faculty_members_to_students' => 'required|numeric',
            'ratio_of_staff_to_students' => 'required|numeric',
            'ratio_of_faculty_members_to_teaching_professors' => 'required|numeric',
            'ratio_of_faculty_members_to_employees' => 'required|numeric',
            'ratio_of_unit_faculty_members_to_faculty_members_of_the_province' => 'required|numeric',
            'ratio_of_unit_students_to_students_of_the_province' => 'required|numeric',
            'ratio_of_unit_employees_to_provincial_employees' => 'required|numeric',
            'unit_teaching_professors_to_teaching_professors_province' => 'required|numeric',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
