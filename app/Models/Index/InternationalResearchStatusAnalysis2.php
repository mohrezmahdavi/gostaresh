<?php

namespace App\Models\Index;

use Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 37 Model
class InternationalResearchStatusAnalysis2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_international_research_status_analysis2";

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

        if (request()->year) {
            $query->where('year', request()->year);
        }

        $query = filterByOwnProvince($query);

        return $query;
    }

    public static $numeric_fields = [
        
        "average_H_index_of_faculty_members",
        "number_of_articles_science_and_nature",
        "print_ISI_articles",
        "percentage_of_quality_articles",
        "number_of_faculty_members_of_world_scientists",
        "number_of_faculty_members_of_international_journals",
        "number_of_international_conferences_held",
        "number_of_international_scientific_books",
        "number_of_international_agreements_implemented",
        "amount_of_international_research_credits",
        "number_of_international_publications",
    ];
    public static $filterColumnsCheckBoxes = [
        "unit"                                                  => "واحد",
        "average_H_index_of_faculty_members"                    => "متوسط H-index اعضای هیات علمی",
        "number_of_articles_science_and_nature"                 => "تعداد مقالات در دو مجله Science وNature ",
        "print_ISI_articles"                                    => "سرانه چاپ مقالات ISI",
        "percentage_of_quality_articles"                        => "درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1)",
        "number_of_faculty_members_of_world_scientists"         => "تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب",
        "number_of_faculty_members_of_international_journals"   => "تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی",
        "number_of_international_conferences_held"              => "تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر",
        "number_of_international_scientific_books"              => "تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی",
        "number_of_international_agreements_implemented"        => "تعداد تفاهم نامه های بین المللی اجرایی شده",
        "amount_of_international_research_credits"              => "میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده",
        "number_of_international_publications"                  => "تعداد نشریه های دارای نمایه های استنادی بین المللی",
    ];
}
