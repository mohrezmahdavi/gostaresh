<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 15 Model
class AcademicMajorEducational extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_academic_major_educational';
    protected $guarded = [];
    protected $appends = ['department_of_education_title'];


    public function getDepartmentOfEducationTitleAttribute()
    {
        foreach (config('gostaresh.department_of_education') as $key => $value) {
            if ($this->department_of_education == $key) {
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
