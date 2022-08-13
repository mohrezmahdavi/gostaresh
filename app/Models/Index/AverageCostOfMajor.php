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
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 55 Model
class AverageCostOfMajor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_average_cost_of_majors";

    protected $appends = ['gender', 'university_type_title', 'department_of_education_title'];

    public function getGenderAttribute()
    {
        foreach (config('gostaresh.gender') as $key => $value) {
            if ($key == $this->gender_id) {
                return $value;
            }
        }
    }

    public function getUniversityTypeTitleAttribute()
    {
        foreach (config('gostaresh.university_type') as $key => $value) {
            if ($key == $this->university_type) {
                return $value;
            }
        }
    }

    public function getDepartmentOfEducationTitleAttribute()
    {
        foreach (config('gostaresh.department_of_education') as $key => $value) {
            if ($key == $this->department_of_education) {
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
        if (request()->province_id)
            $query->where('province_id', request()->province_id);

        if (request()->county_id)
            $query->where('county_id', request()->county_id);

        if (request()->city_id)
            $query->where('city_id', request()->city_id);

        if (request()->rural_district_id)
            $query->where('rural_district_id', request()->rural_district_id);

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

        if (request('year_selected')) {
            $query->where('year', request('year_selected'));
        }

        if (request('start_year')) {
            $query->where('year', '>=' ,request('start_year'));
        }

        if (request('end_year')) {
            $query->where('year', '<=' ,request('end_year'));
        }

        $query = filterByOwnProvince($query);

        return $query;
    }

    public static $numeric_fields = [
        "associate_degree",
        "bachelor_degree",
        "masters",
        "phd",
    ];

    public static $filterColumnsCheckBoxes = [
        "university_type_title"         => "دانشگاه",
        "gender"                        => "جنسیت",
        "department_of_education_title" => "گروه عمده تحصیلی",
        "associate_degree"              => "کاردانی",
        "bachelor_degree"               => "کارشناسی",
        "masters"                       => "کارشناسی ارشد",
        "professional_phd"              => "دکتری حرفه ای",
        "phd"                           => "دکتری تخصصی(Ph.D)",

    ];

}
