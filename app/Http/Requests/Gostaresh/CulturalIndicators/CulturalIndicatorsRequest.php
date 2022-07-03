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
            'unit' => 'required',
            'cultural_centers_status_score' => 'required|between:0,99.99',
            'printed_publications_status_score' => 'required|between:0,99.99',
            'cultural_organizations_status_score' => 'required|between:0,99.99',
            'people_coverage_status_score' => 'required|between:0,99.99',
            'free_thinking_status_score' => 'required|between:0,99.99',
            'interact_with_cyberspace_status_score' => 'required|between:0,99.99',
            'fixed_cultural_events_status_score' => 'required|between:0,99.99',
            'amounts_of_honors_and_awards' => 'required|between:0,99.99',
            'cultural_industry_products' => 'required|between:0,99.99',
            'level_of_initiatives' => 'required|between:0,99.99',
            'points_for_running_luxury_programs' => 'required|between:0,99.99',
            'election_turnout_score' => 'required|between:0,99.99',
            'score_cultural_skills_training_programs' => 'required|between:0,99.99',
            'score_of_cultural_participation_of_Basiji_professors' => 'required|between:0,99.99',
            'participation_of_unit_professors_in_cultural_counseling' => 'required|between:0,99.99',
            'position_of_the_university_as_cultural_center' => 'required|between:0,99.99',
            'score_cultural_programs' => 'required|between:0,99.99',
            'score_Families_of_professors' => 'required|between:0,99.99',
            'score_of_professors' => 'required|between:0,99.99',
            'satisfaction_of_managers_performance' => 'required|between:0,99.99',
            'percentage_of_students_participating_in_sports_competitions' => 'required|between:0,99.99',
            'percentage_of_students_participating_in_cultural_competitions' => 'required|between:0,99.99',
            'percentage_of_students_in_student_organizations' => 'required|between:0,99.99',
            'student_counseling_centers' => 'required|between:0,99.99',
            'percentage_of_students_referring_to_student_counseling_centers' => 'required|between:0,99.99',
            'general_cultural_rank_of_the_university_unit' => 'required|between:0,99.99',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
