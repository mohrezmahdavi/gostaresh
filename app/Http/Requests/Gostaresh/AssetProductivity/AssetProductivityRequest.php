<?php

namespace App\Http\Requests\Gostaresh\AssetProductivity;

use App\Rules\DecimalRangeRule;
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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'nullable|max:255',
            'office_space_utilization_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'utilization_rate_of_educational_equipment' => ['nullable', 'numeric', new DecimalRangeRule()],
            'utilization_rate_of_technology_equipment' => ['nullable', 'numeric', new DecimalRangeRule()],
            'utilization_rate_of_cultural_equipment' => ['nullable', 'numeric', new DecimalRangeRule()],
            'utilization_rate_of_sports_equipment' => ['nullable', 'numeric', new DecimalRangeRule()],
            'operation_rate_of_agricultural_equipment' => ['nullable', 'numeric', new DecimalRangeRule()],
            'operation_rate_of_workshop_equipment' => ['nullable', 'numeric', new DecimalRangeRule()],
            'faculty_capacity_utilization_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'employee_capacity_utilization_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'graduate_capacity_utilization_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'student_capacity_utilization_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'ratio_of_faculty_members_to_students' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'ratio_of_staff_to_students' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'ratio_of_faculty_members_to_teaching_professors' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'ratio_of_faculty_members_to_employees' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'ratio_of_unit_faculty_members_to_faculty_members_of_the_province' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'ratio_of_unit_students_to_students_of_the_province' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'ratio_of_unit_employees_to_provincial_employees' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'unit_teaching_professors_to_teaching_professors_province' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
