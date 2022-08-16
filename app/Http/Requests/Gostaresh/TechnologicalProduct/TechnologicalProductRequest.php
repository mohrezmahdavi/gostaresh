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
            'unit' => 'nullable|max:255',
            'number_of_active_technology_cores' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_technology_units' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_knowledge_based_companies' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_creative_companies' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_commercialized_ideas' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_knowledge_based_products' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_products_without_license' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_licensed_products' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_technology_professors' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_active_technology_students' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
