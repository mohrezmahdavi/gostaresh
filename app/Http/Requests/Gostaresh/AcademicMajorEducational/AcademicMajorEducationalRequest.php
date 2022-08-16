<?php

namespace App\Http\Requests\Gostaresh\AcademicMajorEducational;

use App\Rules\DecimalRangeRule;
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
            'county_id'=> 'nullable|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'department_of_education'=>['nullable', 'numeric', new DecimalRangeRule()],
            'azad_eslami_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'dolati_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'medical_sciences_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'farhangian_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'fani_herfei_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'payam_noor_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'gheir_entefai_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'elmi_karbordi_count'=> ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'azad_eslami_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'dolati_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'medical_sciences_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'farhangian_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'fani_herfei_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'payam_noor_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'gheir_entefai_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'elmi_karbordi_percent'=>['nullable', 'numeric', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
