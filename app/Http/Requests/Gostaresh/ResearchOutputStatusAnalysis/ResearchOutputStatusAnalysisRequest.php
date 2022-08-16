<?php

namespace App\Http\Requests\Gostaresh\ResearchOutputStatusAnalysis;

use App\Rules\DecimalRangeRule;
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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'nullable|max:255',
            'number_of_valid_scientific_articles' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_valid_books' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_authored_books' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_internal_inventions' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_inventions' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_theses' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_research_dissertations' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_compiled_dissertations' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_invented_dissertations' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_product_dissertations' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_completed_research_projects' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_theorizing_chairs' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_memoranda_of_understanding' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'amount_of_national_contracts_concluded' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'amount_of_local_contracts_concluded' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_scientific_journals' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_R&D_research' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_innovative_ideas' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
