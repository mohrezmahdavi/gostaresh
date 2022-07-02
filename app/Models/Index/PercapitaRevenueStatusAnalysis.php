<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 51 Model
class PercapitaRevenueStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_percapita_revenue_status_analyses";

    protected $appends = ['university_type_title', 'grade_title'];

    public function getUniversityTypeTitleAttribute()
    {
        foreach (config('gostaresh.university_type') as $key => $value) {
            if ($key == $this->university_type) {
                return $value;
            }
        }
    }

    public function getGradeTitleAttribute()
    {
        foreach (config('gostaresh.grade') as $key => $value) {
            if ($key == $this->grade) {
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
