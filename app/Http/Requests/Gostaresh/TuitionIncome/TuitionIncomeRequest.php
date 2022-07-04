<?php

namespace App\Http\Requests\Gostaresh\TuitionIncome;

use Illuminate\Foundation\Http\FormRequest;

// Table 50 request
class TuitionIncomeRequest extends FormRequest
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
            'department_of_education' => 'required|numeric|gte:0',
            'associate_degree' => 'required|numeric|between:-99.99,99.99',
            'bachelor_degree' => 'required|numeric|between:-99.99,99.99',
            'masters' => 'required|numeric|between:-99.99,99.99',
            'phd' => 'required|numeric|between:-99.99,99.99',
            'year' => 'required|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
