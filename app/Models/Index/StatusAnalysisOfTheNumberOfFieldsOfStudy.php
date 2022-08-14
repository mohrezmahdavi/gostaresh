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
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 25 Model
class StatusAnalysisOfTheNumberOfFieldsOfStudy extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_status_analysis_of_the_number_of_fields_of_studies";

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
        "unit"                                                          => "واحد",
        "total_number_of_fields_of_study"                               => "تعداد کل رشته های تحصیلی",
        "number_of_international_courses"                               => "تعداد رشته های تحصیلی بین المللی",
        "number_of_virtual_courses"                                     => "تعداد رشته های تحصیلی مجازی",
        "number_of_technical_disciplines"                               => "تعداد رشته های فنی و حرفه ای و مهارتی",
        "number_of_newly_established_courses"                           => "تعداد رشته های تحصیلی جدید التاسیس",
        "number_of_courses_not_accepted"                                => "تعداد رشته / محل های فاقد پذیرش",
        "number_of_courses_without_volunteers"                          => "تعداد رشته / محل های فاقد داوطلب",
        "number_of_GDP_courses"                                         => "تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان",
        "number_of_disciplines_corresponding_to_job_fields"             => "تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان",
        "number_of_fields_corresponding_to_the_specified_specialties"   => "تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان",
        "number_of_courses_offered_virtually"                           => "تعداد واحدهای درسی ارایه شده به صورت مجازی",
        "number_of_popular_fields_more_than_eighty_percent_capacity"    => "تعداد رشته های تحصیلی پر مخاطب (با تعداد کل دانشجوی بیش از 80 درصد ظرفیت)",
        "number_of_courses_with_low_audience"                           => "تعداد رشته های تحصیلی کم مخاطب (با تعداد کل دانشجوی کمتر از 20 درصد ظرفیت)",
        "number_of_fields_of_less_than_5_people"                        => "تعداد رشته های تحصیلی کمتر از 5 نفر",
        "number_of_courses_without_admission"                           => "تعداد رشته های تحصیلی بدون پذیرش",
        "number_of_popular_fields"                                      => "تعداد رشته های تحصیلی پر متقاضی",
        "low_number_of_applicants"                                      => "تعداد رشته های تحصیلی کم متقاضی",
        "year"                                                          => "سال",
 
    ];
    
}
