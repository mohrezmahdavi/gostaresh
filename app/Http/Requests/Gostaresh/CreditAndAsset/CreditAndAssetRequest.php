<?php

namespace App\Http\Requests\Gostaresh\CreditAndAsset;

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
            'county_id'=> 'required|numeric|gte:0',
            'city_id' => 'nullable|numeric|gte:0',
            'rural_district_id' => 'nullable|numeric|gte:0',
            'unit' => 'required|max:255',
            'administrative_credits' => 'required|integer|gte:0|lte:2147483647',
            'educational_credits' => 'required|integer|gte:0|lte:2147483647',
            'research_credits' => 'required|integer|gte:0|lte:2147483647',
            'cultural_credits' => 'required|integer|gte:0|lte:2147483647',
            'innovative_credits' => 'required|integer|gte:0|lte:2147483647',
            'skills_credits' => 'required|integer|gte:0|lte:2147483647',
            'total_University_credits' => 'required|integer|gte:0|lte:2147483647',
            'total_university_assets' => 'required|integer|gte:0|lte:2147483647',
            'year' => 'nullable|numeric|gte:0',
            'month' => 'nullable|numeric|gte:0'
        ];
    }
}
