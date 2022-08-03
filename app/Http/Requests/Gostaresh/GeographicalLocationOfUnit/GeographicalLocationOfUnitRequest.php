<?php

namespace App\Http\Requests\Gostaresh\GeographicalLocationOfUnit;

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
            'county_id'=> 'required|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            "unit_university" => 'required|string',
            // "university_building" => 'required|string',
            // 'land_area' => 'required|numeric|gte:0',
            // 'the_size_of_the_building' => 'required|numeric|gte:0',
            "distance_from_population_density_of_city" => 'required|integer|gte:0|lte:2147483647',
            "distance_from_center_of_province" => 'required|integer|gte:0|lte:2147483647',
            "climate_type_and_weather_conditions" => 'required|numeric|gte:0',
            "distance_to_the_nearest_higher_education_center" => 'required|integer|gte:0|lte:2147483647',
            "distance_to_the_nearest_unit_of_azad_university" => 'required|integer|gte:0|lte:2147483647',
            "level_and_quality_of_access" => 'required|integer|gte:0',
            "international_opportunities_geographical_location" => 'required|integer|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
