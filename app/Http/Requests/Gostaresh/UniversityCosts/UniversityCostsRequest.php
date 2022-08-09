<?php

namespace App\Http\Requests\Gostaresh\UniversityCosts;

use Illuminate\Foundation\Http\FormRequest;

// Table 52,53 request
class UniversityCostsRequest extends FormRequest
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
            'payment_to_faculty_members' => 'required|numeric',
            'total_running_costs' => 'required|numeric',
            'average_salary_of_faculty_members' => 'required|numeric',
            'average_salaries_of_faculty_members_from_research_contracts' => 'required|numeric',
            'student_fees' => 'required|numeric',
            'average_salary_of_employees' => 'required|numeric',
            'current_expenditure_growth_rate' => 'required|numeric',
            'cost_of_paying_office_rent' => 'required|numeric',
            'cost_of_rent_for_educational_building' => 'required|numeric',
            'cost_of_rent_for_research_building' => 'required|numeric',
            'extra_charge_for_rent_extracurricular_building' => 'required|numeric',
            'cost_of_rent_innovation_buildings' => 'required|numeric',
            'energy_costs_of_buildings' => 'required|numeric',
            'cost_of_university_equipment' => 'required|numeric',
//            'training_costs' => 'required|numeric',
//            'research_costs' => 'required|numeric',
//            'innovation_costs' => 'required|numeric',
//            'educational_costs' => 'required|numeric',
//            'development_costs' => 'required|numeric',
//            'cultural_sphere_costs' => 'required|numeric',
//            'administrative_costs' => 'required|numeric',
//            'information_technology_costs' => 'required|numeric',
//            'International_sphere_costs' => 'required|numeric',
//            'costs_of_staff_training_and_faculty' => 'required|numeric',
//            'sports_expenses' => 'required|numeric',
//            'health_costs' => 'required|numeric',
//            'entrepreneurship_costs' => 'required|numeric',
//            'graduate_costs' => 'required|numeric',
//            'branding_costs' => 'required|numeric',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
