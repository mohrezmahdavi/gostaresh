<?php

namespace App\Http\Requests\Gostaresh\GeographicalLocationOfUnit;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

class GeographicalLocationOfUnitRequest extends FormRequest
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
            "unit_university" => 'nullable|string',
            "university_building" => 'nullable|string',
            'land_area' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'the_size_of_the_building' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "distance_from_population_density_of_city" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "distance_from_center_of_province" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "climate_type_and_weather_conditions" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "distance_to_the_nearest_higher_education_center" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "distance_to_the_nearest_unit_of_azad_university" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "level_and_quality_of_access" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "international_opportunities_geographical_location" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
