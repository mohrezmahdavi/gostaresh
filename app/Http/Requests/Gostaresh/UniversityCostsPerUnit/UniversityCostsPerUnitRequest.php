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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'nullable|max:255',
            'training_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'research_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'innovation_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'educational_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'development_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'cultural_sphere_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'administrative_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'information_technology_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'International_sphere_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'costs_of_staff_training_and_faculty' => ['nullable', 'numeric', new DecimalRangeRule()],
            'sports_expenses' => ['nullable', 'numeric', new DecimalRangeRule()],
            'health_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'entrepreneurship_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'graduate_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'branding_costs' => ['nullable', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
