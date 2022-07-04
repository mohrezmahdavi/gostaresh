<?php

namespace App\Http\Requests\Gostaresh\ResearchOutputStatusAnalysis;

use Illuminate\Foundation\Http\FormRequest;

// Table 35 request
class ResearchOutputStatusAnalysisRequest extends FormRequest
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
            'unit' => 'required|max:255',
            'number_of_valid_scientific_articles' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_valid_books' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_authored_books' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_internal_inventions' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_international_inventions' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_theses' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_research_dissertations' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_compiled_dissertations' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_invented_dissertations' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_product_dissertations' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_completed_research_projects' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_theorizing_chairs' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_memoranda_of_understanding' => 'required|numeric|gte:0|lte:2147483647',
            'amount_of_national_contracts_concluded' => 'required|numeric|gte:0|lte:2147483647',
            'amount_of_local_contracts_concluded' => 'required|numeric|between:0,99.99',
            'number_of_scientific_journals' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_R&D_research' => 'required|numeric|gte:0|lte:2147483647',
            'number_of_innovative_ideas' => 'required|numeric|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
