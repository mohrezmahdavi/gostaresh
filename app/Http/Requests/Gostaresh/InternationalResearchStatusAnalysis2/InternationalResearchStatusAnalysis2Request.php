<?php

namespace App\Http\Requests\Gostaresh\InternationalResearchStatusAnalysis2;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 36,37 request
class InternationalResearchStatusAnalysis2Request extends FormRequest
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
            'unit' => 'required',
            'average_H_index_of_faculty_members' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_articles_science_and_nature' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'print_ISI_articles' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'percentage_of_quality_articles' => ['required', 'numeric', new DecimalRangeRule()],
            'number_of_faculty_members_of_world_scientists' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_faculty_members_of_international_journals' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_conferences_held' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_scientific_books' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_agreements_implemented' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'amount_of_international_research_credits' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_publications' => ['required', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
