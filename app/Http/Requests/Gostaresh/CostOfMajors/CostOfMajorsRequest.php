<?php

namespace App\Http\Requests\Gostaresh\CostOfMajors;

use Illuminate\Foundation\Http\FormRequest;

// Table 55 request
class CostOfMajorsRequest extends FormRequest
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
            'university_type' => 'required|numeric|gte:0',
            'gender_id' => 'required|numeric|gte:0',
            'department_of_education' => 'required|numeric|gte:0',
            'associate_degree' => 'required|numeric|between:-99.99,99.99',
            'bachelor_degree' => 'required|numeric|between:-99.99,99.99',
            'masters' => 'required|numeric|between:-99.99,99.99',
            'phd' => 'required|numeric|between:-99.99,99.99',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
