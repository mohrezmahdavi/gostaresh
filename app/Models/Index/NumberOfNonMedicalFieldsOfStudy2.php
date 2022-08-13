<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Major;
use App\Models\Province;
use App\Models\RuralDistrict;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 26,27 Model
class NumberOfNonMedicalFieldsOfStudy2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_number_of_non_medical_fields_of_studies2";

    protected $appends = ['department_of_education_title','major_title'];

    public function getDepartmentOfEducationTitleAttribute()
    {
        foreach (config('gostaresh.department_of_education') as $key => $value) {
            if ($key == $this->department_of_education) {
                return $value;
            }
        }
    }

    public function getMajorTitleAttribute()
    {
        $majors = Major::all();
        foreach ($majors as $major) {
            if ($major->id == $this->major) {
                return $major->name;
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

        if (request('province_id'))
            $query->where('province_id', request('province_id'));

        if (request('county_id'))
            $query->where('county_id', request('county_id'));

        if (request('city_id'))
            $query->where('city_id', request('city_id'));

        if (request('rural_district_id'))
            $query->where('rural_district_id', request('rural_district_id'));

        if (request('start_date'))
        {
            $startDateJ = verta(request('start_date'));
            $startMonth = (int)$startDateJ->format('n');
            $startYear = (int)$startDateJ->format('Y');
            $query->where('year', '>', $startYear)->orWhere(function ($query) use ($startYear, $startMonth) {
                $query->where('year', $startYear)->where('month', '>', $startMonth);
            });
        }

        if (request('end_date'))
        {
            $endDateJ = verta(request('end_date'));
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

        return $query;
    }

    public static $filterColumnsCheckBoxes = [
        "kardani_peyvaste_count"        => "کاردانی پیوسته",
        "kardani_na_peyvaste_count"     => "کاردانی ناپیوسته",
        "karshenasi_peyvaste_count"     => "کارشناسی پیوسته",
        "karshenasi_na_peyvaste_count"  => "کارشناسی ناپیوسته",
        "karshenasi_arshad_count"       => "کارشناسی ارشد",
        "docktora_herfei_count"         => "دکتری حرفه ای",
        "docktora_takhasosi_count"      => "دکتری تخصصی",
        "department_of_education_title" => "گروه فرعی تحصیلی",
        "year" => "سال",

    ];

}
