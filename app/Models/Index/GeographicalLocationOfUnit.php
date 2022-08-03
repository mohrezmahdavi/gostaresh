<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use Facades\Verta;
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
        foreach (config('gostaresh.qualitiesOfAvailable') as $key => $value) {
            if ($key == $this->level_and_quality_of_access) {
                return $value;
            }
        }
    }

    public function getInternationalOpportunitiesGeographicalLocationTitleAttribute()
    {
        foreach (config('gostaresh.international_opportunities') as $key => $value) {
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


    public function scopeWhereRequestsQuery($query)
    {
        $query = filterByOwnProvince($query);

        if (request()->province_id) {
            $query->where('province_id', request()->province_id);
        }

        if (request()->county_id) {
            $query->where('county_id', request()->county_id);
        }

        if (request()->city_id) {
            $query->where('city_id', request()->city_id);
        }

        if (request()->rural_district_id) {
            $query->where('rural_district_id', request()->rural_district_id);
        }

        if (request()->input('start_date')) {
            $startDateJ = Verta::instance(request()->input('start_date'));
            $startMonth = (int)$startDateJ->format('n');
            $startYear = (int)$startDateJ->format('Y');
            $query->where('year', '>', $startYear)->orWhere(function ($query) use ($startYear, $startMonth) {
                $query->where('year', $startYear)->where('month', '>', $startMonth);
            });
        }

        if (request()->input('end_date')) {
            $endDateJ = Verta::instance(request()->input('end_date'));
            $endMonth = (int)$endDateJ->format('n');
            $endYear = (int)$endDateJ->format('Y');
            $query->where('year', '<=', $endYear)->orWhere(function ($query) use ($endYear, $endMonth) {
                $query->where('year', $endYear)->where('month', '<=', $endMonth);
            });
        }

        return $query;
    }
}
