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
            'county_id'=> 'required|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'required|max:255',
            'student_satisfaction' => ['required', 'numeric', new DecimalRangeRule()],
            'unique_organizational_learning_capability' => ['required', 'numeric', new DecimalRangeRule()],
            'students_religious_beliefs' => ['required', 'numeric', new DecimalRangeRule()],
            'student_study_research_culture' => ['required', 'numeric', new DecimalRangeRule()],
            'hijab_culture_of_students' => ['required', 'numeric', new DecimalRangeRule()],
            'culture_of_participation' => ['required', 'numeric', new DecimalRangeRule()],
            'faculty_members_self_confidence' => ['required', 'numeric', new DecimalRangeRule()],
            'amount_of_physical_elements' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_professors_in_unit' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_professors_in_province' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_students_in_unit' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_sample_students_in_province' => ['required', 'numeric', new DecimalRangeRule()],
            'brand_influence_in_the_province' => ['required', 'numeric', new DecimalRangeRule()],
            'level_of_intelligence' => ['required', 'numeric', new DecimalRangeRule()],
            'axial_program' => ['required', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
