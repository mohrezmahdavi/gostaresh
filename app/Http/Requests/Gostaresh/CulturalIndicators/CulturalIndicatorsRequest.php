<?php

namespace App\Http\Requests\Gostaresh\CulturalIndicators;

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
            'cultural_centers_status_score' => 'required|numeric',
            'printed_publications_status_score' => 'required|numeric',
            'cultural_organizations_status_score' => 'required|numeric',
            'people_coverage_status_score' => 'required|numeric',
            'free_thinking_status_score' => 'required|numeric',
            'interact_with_cyberspace_status_score' => 'required|numeric',
            'fixed_cultural_events_status_score' => 'required|numeric',
            'amounts_of_honors_and_awards' => 'required|numeric',
            'cultural_industry_products' => 'required|numeric',
            'level_of_initiatives' => 'required|numeric',
            'points_for_running_luxury_programs' => 'required|numeric',
            'election_turnout_score' => 'required|numeric',
            'score_cultural_skills_training_programs' => 'required|numeric',
            'score_of_cultural_participation_of_Basiji_professors' => 'required|numeric',
            'participation_of_unit_professors_in_cultural_counseling' => 'required|numeric',
            'position_of_the_university_as_cultural_center' => 'required|numeric',
            'score_cultural_programs' => 'required|numeric',
            'score_Families_of_professors' => 'required|numeric',
            'score_of_professors' => 'required|numeric',
            'satisfaction_of_managers_performance' => 'required|numeric',
            'percentage_of_students_participating_in_sports_competitions' => 'required|numeric',
            'percentage_of_students_participating_in_cultural_competitions' => 'required|numeric',
            'percentage_of_students_in_student_organizations' => 'required|numeric',
            'student_counseling_centers' => 'required|numeric',
            'percentage_of_students_referring_to_student_counseling_centers' => 'required|numeric',
            'general_cultural_rank_of_the_university_unit' => 'required|numeric',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
