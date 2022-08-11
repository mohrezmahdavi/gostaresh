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
            'cultural_centers_status_score' => 'required|integer|gte:0|lte:2147483647',
            'printed_publications_status_score' => 'required|integer|gte:0|lte:2147483647',
            'cultural_organizations_status_score' => 'required|integer|gte:0|lte:2147483647',
            'people_coverage_status_score' => 'required|integer|gte:0|lte:2147483647',
            'free_thinking_status_score' => 'required|integer|gte:0|lte:2147483647',
            'interact_with_cyberspace_status_score' => 'required|integer|gte:0|lte:2147483647',
            'fixed_cultural_events_status_score' => 'required|integer|gte:0|lte:2147483647',
            'amounts_of_honors_and_awards' => 'required|integer|gte:0|lte:2147483647',
            'cultural_industry_products' => 'required|integer|gte:0|lte:2147483647',
            'level_of_initiatives' => 'required|integer|gte:0|lte:2147483647',
            'points_for_running_luxury_programs' => 'required|integer|gte:0|lte:2147483647',
            'election_turnout_score' => 'required|integer|gte:0|lte:2147483647',
            'score_cultural_skills_training_programs' => 'required|integer|gte:0|lte:2147483647',
            'score_of_cultural_participation_of_Basiji_professors' => 'required|integer|gte:0|lte:2147483647',
            'participation_of_unit_professors_in_cultural_counseling' => 'required|integer|gte:0|lte:2147483647',
            'position_of_the_university_as_cultural_center' => 'required|integer|gte:0|lte:2147483647',
            'score_cultural_programs' => 'required|integer|gte:0|lte:2147483647',
            'score_Families_of_professors' => 'required|integer|gte:0|lte:2147483647',
            'score_of_professors' => 'required|integer|gte:0|lte:2147483647',
            'satisfaction_of_managers_performance' => 'required|integer|gte:0|lte:2147483647',
            'percentage_of_students_participating_in_sports_competitions' => 'required|numeric',
            'percentage_of_students_participating_in_cultural_competitions' => 'required|numeric',
            'percentage_of_students_in_student_organizations' => 'required|numeric',
            'student_counseling_centers' => 'required|numeric',
            'percentage_of_students_referring_to_student_counseling_centers' => 'required|numeric',
            'general_cultural_rank_of_the_university_unit' => 'required|integer|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
