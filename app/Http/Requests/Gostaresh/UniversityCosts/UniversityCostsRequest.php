<?php

namespace App\Http\Requests\Gostaresh\UniversityCosts;

use App\Rules\DecimalRangeRule;
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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'nullable|max:255',
            'payment_to_faculty_members' => ['nullable', 'numeric', new DecimalRangeRule()],
            'total_running_costs' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'average_salary_of_faculty_members' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'average_salaries_of_faculty_members_from_research_contracts' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'student_fees' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'average_salary_of_employees' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'current_expenditure_growth_rate' => ['nullable', 'numeric', new DecimalRangeRule()],
            'cost_of_paying_office_rent' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cost_of_rent_for_educational_building' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cost_of_rent_for_research_building' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'extra_charge_for_rent_extracurricular_building' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cost_of_rent_innovation_buildings' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'energy_costs_of_buildings' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cost_of_university_equipment' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}

