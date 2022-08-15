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
            'total_running_costs' => 'required|numeric|gte:0|lte:2147483647',
            'average_salary_of_faculty_members' => 'required|numeric|gte:0|lte:2147483647',
            'average_salaries_of_faculty_members_from_research_contracts' => 'required|numeric|gte:0|lte:2147483647',
            'student_fees' => 'required|numeric|gte:0|lte:2147483647',
            'average_salary_of_employees' => 'required|numeric|gte:0|lte:2147483647',
            'current_expenditure_growth_rate' => 'required|numeric',
            'cost_of_paying_office_rent' => 'required|numeric|gte:0|lte:2147483647',
            'cost_of_rent_for_educational_building' => 'required|numeric|gte:0|lte:2147483647',
            'cost_of_rent_for_research_building' => 'required|numeric|gte:0|lte:2147483647',
            'extra_charge_for_rent_extracurricular_building' => 'required|numeric|gte:0|lte:2147483647',
            'cost_of_rent_innovation_buildings' => 'required|numeric|gte:0|lte:2147483647',
            'energy_costs_of_buildings' => 'required|numeric|gte:0|lte:2147483647',
            'cost_of_university_equipment' => 'required|numeric|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}

