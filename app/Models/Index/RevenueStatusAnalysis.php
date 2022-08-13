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

// Table 48 Model
class RevenueStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_revenue_status_analyses";

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
        "total_revenue",
        "income_from_student_tuition",
        "income_from_commercialized_technologies",
        "income_from_research_activities",
        "income_from_skills_training",
        "operating_income_growth_rate",
        "total_non_tuition_income",
        "total_international_income",
        "shareholder_income",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                    => "واحد",
        "total_revenue"                           => "کل درآمد ها",
        "income_from_student_tuition"             => "درآمد حاصل از شهریه دانشجویان",
        "income_from_commercialized_technologies" => "درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده",
        "income_from_research_activities"         => "درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد",
        "income_from_skills_training"             => "درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد",
        "operating_income_growth_rate"            => "نرخ رشد درآمدهای عملیاتی واحد",
        "total_non_tuition_income"                => "مجموع درآمدهای غیر شهریه ای واحد",
        "total_international_income"              => "مجموع درآمد های ناشی از فعالیت های بین المللی",
        "shareholder_income"                      => "درآمد ناشی از سهامداری",
    ];

}
