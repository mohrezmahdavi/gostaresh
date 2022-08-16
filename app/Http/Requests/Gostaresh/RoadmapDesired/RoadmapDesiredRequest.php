<?php

namespace App\Http\Requests\Gostaresh\RoadmapDesired;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 58 request
class RoadmapDesiredRequest extends FormRequest
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
//            'experimental_policy_title' => 'nullable|max:255',
            'title_axis' => 'nullable|max:255',
            'package_number' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'transformation_document' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'project_title' => 'nullable|max:255',
            'quantitative_goal' => 'nullable|max:255',
            'test' => 'nullable|max:255',
            'annual_progress_level' => 'nullable|max:255',
            'responsible_for_track' => 'nullable|max:255',
            'considerations' => 'nullable|max:255',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
