<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 6 Model
class GDPPart extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_gdp_parts';

    protected $guarded = [];

    protected $appends = ['part_title'];

    public function getPartTitleAttribute()
    {
        foreach (config('gostaresh.parts') as $key => $value) {
            if ($key == $this->part) {
                return $value;
            }
        }
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function ruralDistrict()
    {
        return $this->belongsTo(RuralDistrict::class, 'rural_district_id');
    }
}
