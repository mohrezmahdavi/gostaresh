<?php

namespace App\Http\Requests\Gostaresh\NumberOfNonMedicalFieldsOfStudy;

use Illuminate\Foundation\Http\FormRequest;

class NumberOfNonMedicalFieldsOfStudyRequest extends FormRequest
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
            "kardani_peyvaste_count" => 'required|integer|gte:0|lte:2147483647',
            "kardani_na_peyvaste_count" => 'required|integer|gte:0|lte:2147483647',
            "karshenasi_peyvaste_count" => 'required|integer|gte:0|lte:2147483647',
            "karshenasi_na_peyvaste_count" => 'required|integer|gte:0|lte:2147483647',
            "karshenasi_arshad_count" => 'required|integer|gte:0|lte:2147483647',
            "docktora_herfei_count" => 'required|integer|gte:0|lte:2147483647',
            "docktora_takhasosi_count" => 'required|integer|gte:0|lte:2147483647',
            "department_of_education" => 'nullable|integer|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
