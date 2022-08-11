<?php

namespace App\Http\Requests\Gostaresh\TechnologicalProduct;

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
            'number_of_active_technology_cores' => 'required|integer|gte:0|lte:2147483647',
            'number_of_active_technology_units' => 'required|integer|gte:0|lte:2147483647',
            'number_of_active_knowledge_based_companies' => 'required|integer|gte:0|lte:2147483647',
            'number_of_creative_companies' => 'required|integer|gte:0|lte:2147483647',
            'number_of_commercialized_ideas' => 'required|integer|gte:0|lte:2147483647',
            'number_of_knowledge_based_products' => 'required|integer|gte:0|lte:2147483647',
            'number_of_products_without_license' => 'required|integer|gte:0|lte:2147483647',
            'number_of_licensed_products' => 'required|integer|gte:0|lte:2147483647',
            'number_of_active_technology_professors' => 'required|integer|gte:0|lte:2147483647',
            'number_of_active_technology_students' => 'required|integer|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
