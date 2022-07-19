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

// Table 44 Model
class OrganizationalCultureStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_organizational_culture_status_analyses";

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

    public static $amount_fields = [
        "student_satisfaction",
        "unique_organizational_learning_capability",
        "students_religious_beliefs",
        "student_study_research_culture",
        "hijab_culture_of_students",
        "culture_of_participation",
        "faculty_members_self_confidence",
        "amount_of_physical_elements",
        "brand_influence_in_the_province",
        "level_of_intelligence",
        "axial_program",
    ];

    public static $numeric_fields = [

    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                        => "واحد",
        "student_satisfaction"                        => "میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه",
        "unique_organizational_learning_capability"   => "قابلیت یادگیری سازمانی واحد",
        "students_religious_beliefs"                  => "میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی",
        "student_study_research_culture"              => "میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد",
        "hijab_culture_of_students"                   => "میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد",
        "culture_of_participation"                    => "سطح فرهنگ مشارکت پذیری و کار گروهی در واحد",
        "faculty_members_self_confidence"             => "سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد",
        "amount_of_physical_elements"                 => "میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی",
        "percentage_of_sample_professors_in_unit"     => "درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان",
        "percentage_of_sample_professors_in_province" => "درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی",
        "percentage_of_sample_students_in_unit"       => "درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان",
        "percentage_of_sample_students_in_province"   => "درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی",
        "brand_influence_in_the_province"             => "میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان",
        "level_of_intelligence"                       => "میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد",
        "axial_program"                               => "برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)",
    ];
}
