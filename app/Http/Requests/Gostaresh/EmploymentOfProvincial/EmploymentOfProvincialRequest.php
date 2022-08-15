<?php

namespace App\Http\Requests\Gostaresh\EmploymentOfProvincial;

use App\Rules\DecimalRangeRule;
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
            "agriculture_hunting_forestry" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "mining_construction" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "water_electricity_natural_gas_supply" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "building" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "wholesale_retail_vehicle_repair_supply" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "hotel_and_restaurant" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "transportation_warehousing_communications" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "financial_intermediation" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "office_of_public_affairs_urban_services" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "education" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "health_and_social_work" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "activities_of_employed_households" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "overseas_organizations_and_delegations" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "real_estates" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "professional_scientific_technical_activities" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "office_and_support_services" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "art_and_entertainment" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            "other_services" => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
