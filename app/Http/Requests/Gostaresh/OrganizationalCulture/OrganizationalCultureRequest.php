<?php

namespace App\Http\Requests\Gostaresh\OrganizationalCulture;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 44 request
class OrganizationalCultureRequest extends FormRequest
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
            'student_satisfaction' => ['nullable', 'numeric', new DecimalRangeRule()],
            'unique_organizational_learning_capability' => ['nullable', 'numeric', new DecimalRangeRule()],
            'students_religious_beliefs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'student_study_research_culture' => ['nullable', 'numeric', new DecimalRangeRule()],
            'hijab_culture_of_students' => ['nullable', 'numeric', new DecimalRangeRule()],
            'culture_of_participation' => ['nullable', 'numeric', new DecimalRangeRule()],
            'faculty_members_self_confidence' => ['nullable', 'numeric', new DecimalRangeRule()],
            'amount_of_physical_elements' => ['nullable', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_professors_in_unit' => ['nullable', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_professors_in_province' => ['nullable', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_students_in_unit' => ['nullable', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_students_in_province' => ['nullable', 'numeric', new DecimalRangeRule()],
            'brand_influence_in_the_province' => ['nullable', 'numeric', new DecimalRangeRule()],
            'level_of_intelligence' => ['nullable', 'numeric', new DecimalRangeRule()],
            'axial_program' => ['nullable', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
