<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use App\Services\Model\FilterProvince;
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

    public function scopeWhereRequestsQuery($query)
    {
        $query = filterByOwnProvince($query);

        FilterProvince::filter($query);

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
        //"field"                           => "title"
        "department_of_education_title"     => "گروه تحصیلی ",
        "azad_eslami_count"                 => "دانشگاه آزاد اسلامی واحد",
        "dolati_count"                      => "دولتی",
        "payam_noor_count"                  => "پیام نور",
        "gheir_entefai_count"               => "موسسات غیرانتفاعی",
        "elmi_karbordi_count"               => "علمی-کاربردی",
        "year"                              => "سال",

    ];

}
