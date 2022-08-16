<?php

namespace App\Http\Requests\Gostaresh\PercapitaStatusAnalysis;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 46 request
class PercapitaStatusAnalysisRequest extends FormRequest
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
            'percapita_office_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_educational_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_innovation_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_cultural_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_civil_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'building_under_construction' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_residential' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_operating_buildings' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_sports_space' =>['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_aristocratic_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percapita_arena_space' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
