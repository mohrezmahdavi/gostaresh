<?php

namespace App\Http\Requests\Gostaresh\GraduatesOfHigherEducation;

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
            'province_id'=> 'nullable|numeric|gte:0',
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'university' => 'required',
            'gender_id' => 'required|numeric|gte:0',
            'department_of_education' => 'required|numeric|gte:0',
            'associate_degree' => 'required|numeric|gte:0',
            'bachelor_degree' => 'required|numeric|gte:0',
            'masters' => 'required|numeric|gte:0',
            'phd' => 'required|numeric|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}