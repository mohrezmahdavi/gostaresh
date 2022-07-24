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

// Table 42 Model
class CulturalIndicatorsStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_cultural_indicators_status_analyses";

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
        "cultural_centers_status_score",
        "printed_publications_status_score",
        "cultural_organizations_status_score",
        "people_coverage_status_score",
        "free_thinking_status_score",
        "interact_with_cyberspace_status_score",
        "fixed_cultural_events_status_score",
        "amounts_of_honors_and_awards",
        "cultural_industry_products",
        "level_of_initiatives",
        "points_for_running_luxury_programs",
        "election_turnout_score",
        "score_cultural_skills_training_programs",
        "score_of_cultural_participation_of_Basiji_professors",
        "participation_of_unit_professors_in_cultural_counseling",
        "position_of_the_university_as_cultural_center",
        "score_cultural_programs",
        "score_Families_of_professors",
        "score_of_professors",
        "satisfaction_of_managers_performance",
        "student_counseling_centers",
        "general_cultural_rank_of_the_university_unit",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                                           => "واحد",
        "cultural_centers_status_score"                                  => "نمره وضعیت کانون های فرهنگی واحد دانشگاهی",
        "printed_publications_status_score"                              => "نمره وضعیت نشریات چاپی و الکترونیکی واحد",
        "cultural_organizations_status_score"                            => "نمره وضعیت تشکلهای فرهنگی واحد",
        "people_coverage_status_score"                                   => "نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد",
        "free_thinking_status_score"                                     => "نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی",
        "interact_with_cyberspace_status_score"                          => "نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی",
        "fixed_cultural_events_status_score"                             => "نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد",
        "amounts_of_honors_and_awards"                                   => "میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی",
        "cultural_industry_products"                                     => "میزان تولیدات در صنایع فرهنگی",
        "level_of_initiatives"                                           => "سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی",
        "points_for_running_luxury_programs"                             => "امتیاز طراحی و اجرای برنامه های فاخر",
        "election_turnout_score"                                         => "نمره میزان مشارکت در انتخابات",
        "score_cultural_skills_training_programs"                        => "امتیاز برنامه های آموزش مهارت های فرهنگی",
        "score_of_cultural_participation_of_Basiji_professors"           => "نمره مشارکت فرهنگی اساتید بسیجی",
        "participation_of_unit_professors_in_cultural_counseling"        => "میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی",
        "position_of_the_university_as_cultural_center"                  => "جایگاه دانشگاه بعنوان قطب فرهنگی شهر",
        "score_cultural_programs"                                        => "نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی",
        "score_Families_of_professors"                                   => "نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی",
        "score_of_professors"                                            => "نمره برنامه های فرهنگی اساتید واحد دانشگاهی",
        "satisfaction_of_managers_performance"                           => "میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی",
        "percentage_of_students_participating_in_sports_competitions"    => "درصد دانشجویان شرکت کننده در مسابقات ورزشی",
        "percentage_of_students_participating_in_cultural_competitions"  => "درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی",
        "percentage_of_students_in_student_organizations"                => "درصد دانشجویان عضو تشکل های دانشجویی",
        "student_counseling_centers"                                     => "نسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد",
        "percentage_of_students_referring_to_student_counseling_centers" => "درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره",
        "general_cultural_rank_of_the_university_unit"                   => "رتبه کلی فرهنگی واحد دانشگاهی",
    ];

}
