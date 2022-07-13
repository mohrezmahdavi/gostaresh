<?php

namespace App\Http\Requests\Gostaresh\EmploymentOfProvincial;

use Illuminate\Foundation\Http\FormRequest;

class EmploymentOfProvincialRequest extends FormRequest
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
            "agriculture_hunting_forestry" => 'required|numeric|gte:0',
            "mining_construction" => 'required|numeric|gte:0',
            "water_electricity_natural_gas_supply" => 'required|numeric|gte:0',
            "building" => 'required|numeric|gte:0',
            "wholesale_retail_vehicle_repair_supply" => 'required|numeric|gte:0',
            "hotel_and_restaurant" => 'required|numeric|gte:0',
            "transportation_warehousing_communications" => 'required|numeric|gte:0',
            "financial_intermediation" => 'required|numeric|gte:0',
            "office_of_public_affairs_urban_services" => 'required|numeric|gte:0',
            "education" => 'required|numeric|gte:0',
            "health_and_social_work" => 'required|numeric|gte:0',
            "activities_of_employed_households" => 'required|numeric|gte:0',
            "overseas_organizations_and_delegations" => 'required|numeric|gte:0',
            "real_estates" => 'required|numeric|gte:0',
            "professional_scientific_technical_activities" => 'required|numeric|gte:0',
            "office_and_support_services" => 'required|numeric|gte:0',
            "art_and_entertainment" => 'required|numeric|gte:0',
            "other_services" => 'required|numeric|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
