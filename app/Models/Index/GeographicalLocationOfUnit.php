<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 2 Model
class GeographicalLocationOfUnit extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_geographical_location_of_unit';

    protected $guarded = [];

    protected $appends = ['international_opportunities_geographical_location_title', 'level_and_quality_of_access_title','climate_type_and_weather_conditions_title'];

    public function getLevelAndQualityOfAccessTitleAttribute()
    {
        foreach (config('gostaresh.qualities') as $key => $value) {
            if ($key == $this->level_and_quality_of_access) {
                return $value;
            }
        }
    }

    public function getInternationalOpportunitiesGeographicalLocationTitleAttribute()
    {
        foreach (config('gostaresh.qualities') as $key => $value) {
            if ($key == $this->international_opportunities_geographical_location) {
                return $value;
            }
        }
    }

    public function getClimateTypeAndWeatherConditionsTitleAttribute()
    {
        foreach (config('gostaresh.climates') as $key => $value) {
            if ($key == $this->climate_type_and_weather_conditions) {
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
