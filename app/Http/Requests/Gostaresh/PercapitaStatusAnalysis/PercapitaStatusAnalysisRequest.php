<?php

namespace App\Http\Requests\Gostaresh\PercapitaStatusAnalysis;

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
            'county_id'=> 'required|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'required|max:255',
            'percapita_office_space' => 'required|integer|gte:0|lte:2147483647',
            'percapita_educational_space' => 'required|integer|gte:0|lte:2147483647',
            'percapita_innovation_space' => 'required|integer|gte:0|lte:2147483647',
            'percapita_cultural_space' => 'required|integer|gte:0|lte:2147483647',
            'percapita_civil_space' => 'required|integer|gte:0|lte:2147483647',
            'building_under_construction' => 'required|integer|gte:0|lte:2147483647',
            'percapita_residential' => 'required|integer|gte:0|lte:2147483647',
            'percapita_operating_buildings' => 'required|integer|gte:0|lte:2147483647',
            'percapita_sports_space' =>'required|integer|gte:0|lte:2147483647',
            'percapita_aristocratic_space' => 'required|integer|gte:0|lte:2147483647',
            'percapita_arena_space' => 'required|integer|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
