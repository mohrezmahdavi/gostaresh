<?php

namespace App\Http\Requests\Gostaresh\StatusAnalysisOfTheNumberOfCurricula;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

class StatusAnalysisOfTheNumberOfCurriculaRequest extends FormRequest
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
            "total_number_of_curricula" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_modified_curricula" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "new_interdisciplinary_curricula_implemented" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "complete_new_interdisciplinary_curricula" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_common_curricula_with_the_world" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            "number_of_curricula_developed" => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
