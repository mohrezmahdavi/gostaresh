<?php

namespace App\Http\Requests\Gostaresh\TechnologicalProduct;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 40 request
class TechnologicalProductRequest extends FormRequest
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
            'unit' => 'required|max:255',
            'number_of_active_technology_cores' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_technology_units' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_knowledge_based_companies' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_creative_companies' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_commercialized_ideas' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_knowledge_based_products' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_products_without_license' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_licensed_products' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_technology_professors' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_technology_students' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
