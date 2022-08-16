<?php

namespace App\Http\Requests\Gostaresh\CreditAndAsset;

use App\Rules\DecimalRangeRule;
use Illuminate\Foundation\Http\FormRequest;

// Table 56 request
class CreditAndAssetRequest extends FormRequest
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
            'administrative_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'educational_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'research_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'cultural_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'innovative_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'skills_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'total_University_credits' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'total_university_assets' => ['nullable', 'numeric', 'gte:0', new DecimalRangeRule()],
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
