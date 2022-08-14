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

// Table 47 Model
class IndexOfAssetProductivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_index_of_asset_productivity";

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

    public static $numeric_fields = [];

    public static $filterColumnsCheckBoxes = [
        "unit"                                                             => "واحد",
        "office_space_utilization_rate"                                    => "نرخ بهره برداری از فضای اداری",
        "utilization_rate_of_educational_equipment"                        => "نرخ بهره برداری از فضا و تجهیزات آموزشی",
        "utilization_rate_of_technology_equipment"                         => "نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری",
        "utilization_rate_of_cultural_equipment"                           => "سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی",
        "utilization_rate_of_sports_equipment"                             => "نرخ بهره برداری از فضا و تجهیزات ورزشی",
        "operation_rate_of_agricultural_equipment"                         => "نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی",
        "operation_rate_of_workshop_equipment"                             => "ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی",
        "faculty_capacity_utilization_rate"                                => "نرخ بهره برداری از ظرفیت اعضای هیات علمی",
        "employee_capacity_utilization_rate"                               => "نرخ بهره برداری از ظرفیت کارمندان",
        "graduate_capacity_utilization_rate"                               => "نرخ بهره برداری از ظرفیت فارغ التحصیلان",
        "student_capacity_utilization_rate"                                => "نرخ بهره برداری از ظرفیت دانشجویان",
        "ratio_of_faculty_members_to_students"                             => "نسبت تعداد اعضای هیات علمی به دانشجویان",
        "ratio_of_staff_to_students"                                       => "نسبت تعداد کارمندان به دانشجویان",
        "ratio_of_faculty_members_to_teaching_professors"                  => "نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس",
        "ratio_of_faculty_members_to_employees"                            => "نسبت تعداد اعضای هیات علمی به کارمندان واحد",
        "ratio_of_unit_faculty_members_to_faculty_members_of_the_province" => "نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان",
        "ratio_of_unit_students_to_students_of_the_province"               => "نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان",
        "ratio_of_unit_employees_to_provincial_employees"                  => "نسبت تعداد کارمندان به میانگین تعداد کارمندان استان",
        "unit_teaching_professors_to_teaching_professors_province"         => "نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان",
    ];

}
