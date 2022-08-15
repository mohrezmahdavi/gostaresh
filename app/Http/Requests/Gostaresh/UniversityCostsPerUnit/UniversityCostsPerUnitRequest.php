<?php

namespace App\Http\Requests\Gostaresh\UniversityCostsPerUnit;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 52,53 request
class UniversityCostsPerUnitRequest extends FormRequest
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
            'training_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'research_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'innovation_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'educational_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'development_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'cultural_sphere_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'administrative_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'information_technology_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'International_sphere_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'costs_of_staff_training_and_faculty' => ['required', 'numeric', new DecimalRangeRule()],
            'sports_expenses' => ['required', 'numeric', new DecimalRangeRule()],
            'health_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'entrepreneurship_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'graduate_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'branding_costs' => ['required', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
