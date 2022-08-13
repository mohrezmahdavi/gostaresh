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

// Table 36 Model
class InternationalResearchStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_international_research_status_analysis";

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
        "number_of_laboratories",
        "number_of_research_projects",
        "number_of_shared_articles",
        "number_of_international_research_projects",
        "number_of_faculty_members_using_study_abroad",
        "number_of_graduate_students_with_opportunities_abroad",
        "number_of_research_opportunities_presented",
        "number_of_foreign_workshops_held",
        "number_of_international_lectures_held",
        "number_of_international_awards",

    ];
    public static $filterColumnsCheckBoxes = [
        "unit"                                                  => "واحد",
        "number_of_laboratories"                                => "تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب",
        "number_of_research_projects"                           => "تعداد طرح های تحقیقاتی مشترک با محققان خارجی",
        "number_of_shared_articles"                             => "تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور",
        "number_of_international_research_projects"             => "تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار",
        "number_of_faculty_members_using_study_abroad"          => "تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی",
        "number_of_graduate_students_with_opportunities_abroad" => "تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور",
        "number_of_research_opportunities_presented"            => "تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی ومحققان ایرانی خارج از کشور",
        "number_of_foreign_workshops_held"                      => "تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی ومتخصصان ایرانی غیر مقیم",
        "number_of_international_lectures_held"                 => "تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم",
        "number_of_international_awards"                        => "تعداد جوایز بین المللی کسب شده در ۵ سال اخیر",

    ];

}
