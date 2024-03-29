<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Grade;
use App\Models\Major;
use App\Models\Minor;
use App\Models\Province;
use App\Models\RuralDistrict;
use App\Services\Model\FilterProvince;
use Facades\Verta;
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
        foreach (Grade::all() as $grade) {
            if ($grade->id == $this->grade_id) {
                return $grade->name;
            }
        }
    }

    public function getMajorTitleAttribute()
    {
        foreach (Major::all() as $major) {
            if ($major->id == $this->major_id) {
                return $major->name;
            }
        }
    }

    public function getMinorTitleAttribute()
    {
        foreach (Minor::all() as $minor) {
            if ($minor->id == $this->minor_id) {
                return $minor->name;
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
        FilterProvince::filter($query);

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

    public static $numeric_fields = ["percapita_revenue_status_analyses"];

    public static $filterColumnsCheckBoxes = [
        "unit"                              => "واحد",
        "university_type_title"             => "دانشگاه",
        "grade_title"                       => "مقطع تحصیلی",
        "major_title"                       => "رشته",
        "minor_title"                       => "گرایش",
        "percapita_revenue_status_analyses" => "تحلیل وضعیت درآمد سرانه",
    ];

}
