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

class UniversityCostsPerUnit extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_university_costs_per_units";

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
        "training_costs",
        "research_costs",
        "innovation_costs",
        "educational_costs",
        "development_costs",
        "cultural_sphere_costs",
        "administrative_costs",
        "information_technology_costs",
        "International_sphere_costs",
        "costs_of_staff_training_and_faculty",
        "sports_expenses",
        "health_costs",
        "entrepreneurship_costs",
        "graduate_costs",
        "branding_costs",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                                        => "واحد",
        "training_costs"                                              => "هزینه های حوزه آموزش",
        "research_costs"                                              => "هزینه های حوزه پژوهش",
        "innovation_costs"                                            => "هزینه های حوزه فناوری و نوآوری",
        "educational_costs"                                           => "هزینه های حوزه مهارت آموزشی و کارآفرینی",
        "development_costs"                                           => "هزینه های حوزه تحقیق و توسعه",
        "cultural_sphere_costs"                                       => "هزینه های حوزه فرهنگی",
        "administrative_costs"                                        => "هزینه های حوزه اداری",
        "information_technology_costs"                                => "هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی",
        "International_sphere_costs"                                  => "هزینه های حوزه بین الملل",
        "costs_of_staff_training_and_faculty"                         => "هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید",
        "sports_expenses"                                             => "هزینه های حوزه ورزشی",
        "health_costs"                                                => "هزینه های حوزه بهداشت و سلامت",
        "entrepreneurship_costs"                                      => "هزینه های حوزه ترویج کارآفرینی و اشتغال",
        "graduate_costs"                                              => "هزینه های حوزه فارغ التحصیلان",
        "branding_costs"                                              => "هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان",

    ];
}