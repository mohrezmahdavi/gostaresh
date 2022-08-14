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

// Table 31 Model
class StatusAnalysisOfTheNumberOfCurricula extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_status_analysis_of_the_number_of_curricula";

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
        "total_number_of_curricula",
        "number_of_modified_curricula",
        "new_interdisciplinary_curricula_implemented",
        "complete_new_interdisciplinary_curricula",
        "number_of_common_curricula_with_the_world",
        "number_of_curricula_developed",];

    public static $filterColumnsCheckBoxes = [
//        "field" => "title"
        "unit"                                        => "واحد",
        "total_number_of_curricula"                   => "تعداد کل برنامه های درسی (رشته گرایش ها)",
        "number_of_modified_curricula"                => "تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی",
        "new_interdisciplinary_curricula_implemented" => "برنامه های درسی جدید میان رشته ای مورد اجرا",
        "complete_new_interdisciplinary_curricula"    => "کل برنامه های درسی جدید میان رشته ای مورد اجرا",
        "number_of_common_curricula_with_the_world"   => "تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان",
        "number_of_curricula_developed"               => "تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر",
    ];

}
