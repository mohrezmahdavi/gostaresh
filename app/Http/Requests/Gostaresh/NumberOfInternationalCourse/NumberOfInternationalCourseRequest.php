<?php

namespace App\Http\Requests\Gostaresh\NumberOfInternationalCourse;

use Illuminate\Foundation\Http\FormRequest;

class NumberOfInternationalCourseRequest extends FormRequest
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
            "gender_id" => 'required|numeric',
            "department_of_education" => 'required|integer|gte:0',
            "kardani_count" => 'required|integer|gte:0',
            "karshenasi_count" => 'required|integer|gte:0',
            "karshenasi_arshad_count" => 'required|integer|gte:0',
            "docktora_count" => 'required|integer|gte:0',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
