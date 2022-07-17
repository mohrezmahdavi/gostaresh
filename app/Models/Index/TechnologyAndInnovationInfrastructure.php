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

// Table 39 Model
class TechnologyAndInnovationInfrastructure extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_technology_and_innovation_infrastructures";

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
        "number_of_active_innovation_houses",
        "number_of_active_accelerators",
        "number_of_active_growth_centers",
        "number_of_active_technology_cores",
        "number_of_active_skill_high_schools",
        "number_of_skill_training_centers",
        "number_of_research_centers",
        "number_of_development_offices",
        "number_of_industry_trade_offices",
        "number_of_entrepreneurship_centers",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                => "واحد",
        "number_of_active_innovation_houses"  => "تعداد سرای نوآوری فعال",
        "number_of_active_accelerators"       => "تعداد شتاب دهنده فعال",
        "number_of_active_growth_centers"     => "تعداد مراکز رشد فعال",
        "number_of_active_technology_cores"   => "تعداد هسته فناور فعال",
        "number_of_active_skill_high_schools" => "تعداد مدارس عالی مهارتی فعال",
        "number_of_skill_training_centers"    => "تعداد مراکز توانمندسازی و آموزش مهارتی",
        "number_of_research_centers"          => "تعداد مراکز تحقیقاتی",
        "number_of_development_offices"       => "تعداد دفاتر توسعه و انتقال فناوری",
        "number_of_industry_trade_offices"    => "تعداددفاتر کلینیک صنعت، معدن و تجارت",
        "number_of_entrepreneurship_centers"  => "تعداد مراکز کارآفرینی",
    ];

}
