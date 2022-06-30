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

// Table 16,17 Model
class NumberOfStudentsStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_number_of_students_status_analyses";

    protected $appends = ['department_of_education_title', 'university_type_title', 'gender_title'];

    public function getGenderTitleAttribute()
    {
        foreach(config('gostaresh.gender') as $key => $value)
        {
            if ($key == $this->gender_id ) {
                return $value;
            }
        }
    }

    public function getUniversityTypeTitleAttribute()
    {
        foreach(config('gostaresh.university_type') as $key => $value)
        {
            if ($key == $this->university_type ) {
                return $value;
            }
        }
    }

    public function getDepartmentOfEducationTitleAttribute()
    {
        foreach(config('gostaresh.department_of_education') as $key => $value)
        {
            if ($key == $this->department_of_education ) {
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
