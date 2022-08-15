<?php

namespace App\Http\Requests\Gostaresh\CulturalIndicators;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 42 request
class CulturalIndicatorsRequest extends FormRequest
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
            'cultural_centers_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'printed_publications_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cultural_organizations_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'people_coverage_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'free_thinking_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'interact_with_cyberspace_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'fixed_cultural_events_status_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'amounts_of_honors_and_awards' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cultural_industry_products' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'level_of_initiatives' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'points_for_running_luxury_programs' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'election_turnout_score' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'score_cultural_skills_training_programs' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'score_of_cultural_participation_of_Basiji_professors' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'participation_of_unit_professors_in_cultural_counseling' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'position_of_the_university_as_cultural_center' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'score_cultural_programs' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'score_Families_of_professors' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'score_of_professors' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'satisfaction_of_managers_performance' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percentage_of_students_participating_in_sports_competitions' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_students_participating_in_cultural_competitions' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_students_in_student_organizations' => ['required', 'numeric', new DecimalRangeRule()],
            'student_counseling_centers' => ['required', 'numeric', new DecimalRangeRule()],
            'percentage_of_students_referring_to_student_counseling_centers' => ['required', 'numeric', new DecimalRangeRule()],
            'general_cultural_rank_of_the_university_unit' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
