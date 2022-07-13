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
            "university_building" => 'required|string',
            "distance_from_population_density_of_city" => 'required|numeric|gte:0',
            "distance_from_center_of_province" => 'required|numeric|gte:0',
            "climate_type_and_weather_conditions" => 'required|numeric|gte:0',
            "distance_to_the_nearest_higher_education_center" => 'required|string',
            "distance_to_the_nearest_unit_of_azad_university" => 'required|string',
            "level_and_quality_of_access" => 'required|numeric|gte:0',
            "international_opportunities_geographical_location" => 'required|numeric|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
