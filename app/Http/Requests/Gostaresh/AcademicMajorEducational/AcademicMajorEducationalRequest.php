<?php

namespace App\Http\Requests\Gostaresh\AcademicMajorEducational;

use Illuminate\Foundation\Http\FormRequest;

class AcademicMajorEducationalRequest extends FormRequest
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
            'department_of_education'=> 'required|numeric',
            'azad_eslami_count'=> 'required|numeric|gte:0',
            'dolati_count'=> 'required|numeric|gte:0',
            'payam_noor_count'=> 'required|numeric|gte:0',
            'gheir_entefai_count'=> 'required|numeric|gte:0',
            'elmi_karbordi_count'=> 'required|numeric|gte:0',            
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
