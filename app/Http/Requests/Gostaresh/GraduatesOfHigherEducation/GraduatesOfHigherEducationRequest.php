<?php

namespace App\Http\Requests\Gostaresh\GraduatesOfHigherEducation;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 32 request
class GraduatesOfHigherEducationRequest extends FormRequest
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
            'university' => 'nullable|max:255',
            'gender_id' => 'nullable|numeric|gte:0',
            'department_of_education' => 'nullable|numeric|gte:0',
            'associate_degree' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'bachelor_degree' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'masters' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'phd' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
