<?php

namespace App\Http\Requests\Gostaresh\InternationalTechnology;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 41 request
class InternationalTechnologyRequest extends FormRequest
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
            'number_of_participation' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_technical_services' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'earnings' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_inventions' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_knowledge_based_companies' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
