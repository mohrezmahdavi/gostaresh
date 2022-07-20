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

// Table 34 Model
class TeachersStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_teachers_status_analyses";

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
        "number_of_faculty_members",
        "scientific_programs_faculty_members",
        "upgraded_faculty_members",
        "number_of_tuition_teachers",
        "number_of_officer_faculty_members_in_other_unit",
        "number_of_officer_faculty_members_in_central_organization",
        "number_of_participant_faculty_members_in_cooperation_plan",
        "number_of_transfer_faculty_members",
        "number_of_instructor_faculty_members",
        "number_of_assistant_professor_faculty_members",
        "number_of_associate_professor_faculty_members",
        "number_of_full_professor_faculty_members",
        "number_of_faculty_members_smaller_50_years_old",
        "number_of_technology_faculty_members",
        "number_of_faculty_members_type_a",
        "number_of_faculty_members_type_b",
        "number_of_top_scientific_faculty_members",
        "average_level_of_research_productivity_of_faculty_members",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                                      => "واحد",
        "number_of_faculty_members"                                 => "تعداد اعضای هیات علمی",
        "scientific_programs_faculty_members"                       => "تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی",
        "upgraded_faculty_members"                                  => "تعداد اعضای هیات علمی ارتقا یافته",
        "number_of_tuition_teachers"                                => "تعداد مدرسین حق التدریس و اساتید مدعو",
        "number_of_officer_faculty_members_in_other_unit"           => "تعداد اعضای هیات علمی مامور در سایر واحدها",
        "number_of_officer_faculty_members_in_central_organization" => "تعداد اعضای هیات علمی مامور در سازمان مرکزی",
        "number_of_participant_faculty_members_in_cooperation_plan" => "تعداد اعضای هیات علمی شرکت کننده در طرح تعاون",
        "number_of_transfer_faculty_members"                        => "تعداد اعضای هیات علمی انتقالی",
        "number_of_instructor_faculty_members"                      => "تعداد اعضای هیات علمی با درجه مربی",
        "number_of_assistant_professor_faculty_members"             => "تعداد اعضای هیات علمی با درجه استادیار",
        "number_of_associate_professor_faculty_members"             => "تعداد اعضای هیات علمی با درجه دانشیار",
        "number_of_full_professor_faculty_members"                  => "تعداد اعضای هیات علمی با درجه استاد تمام",
        "number_of_faculty_members_smaller_50_years_old"            => "تعداد اعضای هیات علمی دارای سن کمتر از 50 سال",
        "number_of_technology_faculty_members"                      => "تعداد اعضای هیات علمی فناور",
        "number_of_faculty_members_type_a"                          => "تعداد اعضای هیات علمی نوع الف",
        "number_of_faculty_members_type_b"                          => "تعداد اعضای هیات علمی نوع ب",
        "number_of_top_scientific_faculty_members"                  => "تعداد اعضای هیات علمی سرآمد علمی",
        "average_level_of_research_productivity_of_faculty_members" => "متوسط سطح بهره وری پژوهشی اعضای هیات علمی",
    ];
}
