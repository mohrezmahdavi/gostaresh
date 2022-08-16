<?php

namespace App\Http\Requests\Gostaresh\InternationalResearchStatusAnalysis;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 36,37 request
class InternationalResearchStatusAnalysisRequest extends FormRequest
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
            'unit' => 'nullable',
            'number_of_laboratories' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_research_projects' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_shared_articles' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_research_projects' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_faculty_members_using_study_abroad' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_graduate_students_with_opportunities_abroad' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_research_opportunities_presented' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_foreign_workshops_held' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_lectures_held' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'number_of_international_awards' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
