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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            "agriculture_hunting_forestry" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "mining_construction" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "water_electricity_natural_gas_supply" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "building" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "wholesale_retail_vehicle_repair_supply" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "hotel_and_restaurant" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "transportation_warehousing_communications" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "financial_intermediation" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "office_of_public_affairs_urban_services" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "education" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "health_and_social_work" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "activities_of_employed_households" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "overseas_organizations_and_delegations" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "real_estates" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "professional_scientific_technical_activities" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "office_and_support_services" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "art_and_entertainment" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "other_services" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
