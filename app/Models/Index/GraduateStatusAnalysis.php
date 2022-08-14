<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use App\Services\Model\FilterProvince;
use Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 33 Model
class GraduateStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_graduate_status_analyses";

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


    public static $numeric_fields = [
        "total_graduates",
        "employed_graduates",
        "graduate_growth_rate",
        "related_employed_graduates",
        "skill_certification_graduates",
        "employed_graduates_6_months_after_graduation",
        "average_monthly_income_employed_graduates",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                         => "واحد",
        "total_graduates"                              => "تعداد کل فارغ التحصیلان",
        "employed_graduates"                           => "تعداد فارغ التحصیلان شاغل",
        "graduate_growth_rate"                         => "نرخ رشد فارغ التحصیلان",
        "related_employed_graduates"                   => "تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی",
        "skill_certification_graduates"                => "تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای",
        "employed_graduates_6_months_after_graduation" => "تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل",
    ];
}
