<?php

namespace App\Http\Requests\Gostaresh\UnitsGeneralStatus;

use Illuminate\Foundation\Http\FormRequest;

// Table 57 request
class UnitsGeneralStatusRequest extends FormRequest
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
            'degree/rank' => 'nullable|max:255',
            'score' => 'nullable|max:255',
            'established_year' => 'nullable|max:255',
            'approved_number_and_titles_of_the_faculty' => 'nullable|max:255',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
