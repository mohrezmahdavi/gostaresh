<?php

namespace App\Http\Requests\Gostaresh\TeachersStatusAnalysis;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 34 request
class TeachersStatusAnalysisRequest extends FormRequest
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
            'number_of_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'scientific_programs_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'upgraded_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_tuition_teachers' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_officer_faculty_members_in_other_unit' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_officer_faculty_members_in_central_organization' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_participant_faculty_members_in_cooperation_plan' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_transfer_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_instructor_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_assistant_professor_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_associate_professor_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_full_professor_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_faculty_members_smaller_50_years_old' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_technology_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_faculty_members_type_a' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_faculty_members_type_b' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_top_scientific_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'average_level_of_research_productivity_of_faculty_members' => ['nullable', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
