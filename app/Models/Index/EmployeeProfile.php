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

// Table 45 Model
class EmployeeProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_employee_profiles";

    protected $appends = ['university_type_title'];

    public function getUniversityTypeTitleAttribute()
    {
        foreach (config('gostaresh.university_type') as $key => $value) {
            if ($key == $this->higher_education_subsystems) {
                return $value;
            }
        }
    }

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

        "number_of_non_faculty_staff",
        "number_of_male_employees",
        "number_of_female_employees",
        "number_of_administrative_staff",
        "number_of_training_staff",
        "number_of_research_staff",
        "number_of_PhD_staff",
        "number_of_master_staff",
        "number_of_expert_staff",
        "number_of_diploma_and_sub_diploma_employees",
        "number_of_employees_studying",
    ];

    public static $filterColumnsCheckBoxes = [
        "university_type_title"               => "زیرنظام های آموزش عالی شهرستان",
        "number_of_non_faculty_staff"                 => "تعداد کارکنان غیر هیات علمی",
        "average_age_of_employees"                    => "میانگین سنی کارمندان",
        "number_of_male_employees"                    => "تعداد کارمندان مرد",
        "number_of_female_employees"                  => "تعداد کارمندان زن",
        "number_of_administrative_staff"              => "تعداد کارمندان اداری",
        "number_of_training_staff"                    => "تعداد کارمندان بخش آموزشی",
        "number_of_research_staff"                    => "تعداد کارمندان بخش پژوهش",
        "number_of_PhD_staff"                         => "تعداد کارمندان با مدرک دکترا",
        "number_of_master_staff"                      => "تعداد کارمندان با مدرک کارشناسی ارشد",
        "number_of_expert_staff"                      => "تعداد کارمندان با مدرک کارشناسی",
        "number_of_diploma_and_sub_diploma_employees" => "تعداد کارمندان با مدرک دیپلم و زیر دیپلم",
        "number_of_employees_studying"                => "تعداد کارمندان در حال تحصیل",
        "growth_rate"                                 => "نرخ رشد کارمندان",

    ];

}
