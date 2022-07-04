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
            'payment_to_faculty_members' => 'required|numeric|between:-99.99,99.99',
            'total_running_costs' => 'required|numeric|between:-99.99,99.99',
            'average_salary_of_faculty_members' => 'required|numeric|between:-99.99,99.99',
            'average_salaries_of_faculty_members_from_research_contracts' => 'required|numeric|between:-99.99,99.99',
            'student_fees' => 'required|numeric|between:-99.99,99.99',
            'average_salary_of_employees' => 'required|numeric|between:-99.99,99.99',
            'current_expenditure_growth_rate' => 'required|numeric|between:-99.99,99.99',
            'cost_of_paying_office_rent' => 'required|numeric|between:-99.99,99.99',
            'cost_of_rent_for_educational_building' => 'required|numeric|between:-99.99,99.99',
            'cost_of_rent_for_research_building' => 'required|numeric|between:-99.99,99.99',
            'extra_charge_for_rent_extracurricular_building' => 'required|numeric|between:-99.99,99.99',
            'cost_of_rent_innovation_buildings' => 'required|numeric|between:-99.99,99.99',
            'energy_costs_of_buildings' => 'required|numeric|between:-99.99,99.99',
            'cost_of_university_equipment' => 'required|numeric|between:-99.99,99.99',
            'training_costs' => 'required|numeric|between:-99.99,99.99',
            'research_costs' => 'required|numeric|between:-99.99,99.99',
            'innovation_costs' => 'required|numeric|between:-99.99,99.99',
            'educational_costs' => 'required|numeric|between:-99.99,99.99',
            'development_costs' => 'required|numeric|between:-99.99,99.99',
            'cultural_sphere_costs' => 'required|numeric|between:-99.99,99.99',
            'administrative_costs' => 'required|numeric|between:-99.99,99.99',
            'information_technology_costs' => 'required|numeric|between:-99.99,99.99',
            'International_sphere_costs' => 'required|numeric|between:-99.99,99.99',
            'costs_of_staff_training_and_faculty' => 'required|numeric|between:-99.99,99.99',
            'sports_expenses' => 'required|numeric|between:-99.99,99.99',
            'health_costs' => 'required|numeric|between:-99.99,99.99',
            'entrepreneurship_costs' => 'required|numeric|between:-99.99,99.99',
            'graduate_costs' => 'required|numeric|between:-99.99,99.99',
            'branding_costs' => 'required|numeric|between:-99.99,99.99',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
