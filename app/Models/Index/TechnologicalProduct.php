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

// Table 40 Model
class TechnologicalProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_technological_products";

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

    public static $numeric_fields = [
        "number_of_active_technology_cores",
        "number_of_active_technology_units",
        "number_of_active_knowledge_based_companies",
        "number_of_creative_companies",
        "number_of_commercialized_ideas",
        "number_of_knowledge_based_products",
        "number_of_products_without_license",
        "number_of_licensed_products",
        "number_of_active_technology_professors",
        "number_of_active_technology_students",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                       => "واحد",
        "number_of_active_technology_cores"          => "تعداد هسته فناور فعال",
        "number_of_active_technology_units"          => "تعداد واحدهای فناور فعال",
        "number_of_active_knowledge_based_companies" => "تعداد شرکت دانش بنیان فعال",
        "number_of_creative_companies"               => "تعداد شرکت های خلاق",
        "number_of_commercialized_ideas"             => "تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده",
        "number_of_knowledge_based_products"         => "تعداد محصولات دانش بنیان",
        "number_of_products_without_license"         => "تعداد محصولات بدون مجوز",
        "number_of_licensed_products"                => "تعداد محصولات با مجوز",
        "number_of_active_technology_professors"     => "تعداد استاد فناور فعال",
        "number_of_active_technology_students"       => "تعداد دانشجوی فناور فعال",
    ];

}
