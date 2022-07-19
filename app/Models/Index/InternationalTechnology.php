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

// Table 41 Model
class InternationalTechnology extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_international_technologies";

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
        "number_of_participation",
        "number_of_technical_services",
        "earnings",
        "number_of_international_inventions",
        "number_of_international_knowledge_based_companies",
    ];

    public static $filterColumnsCheckBoxes = [
        "unit"                                              => "واحد",
        "number_of_participation"                           => "تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور",
        "number_of_technical_services"                      => "تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی",
        "earnings"                                          => "میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی",
        "number_of_international_inventions"                => "تعداد ثبت و یا فایلینگ اختراعات بین المللی",
        "number_of_international_knowledge_based_companies" => "تعداد شرکت های دانش بنیان با فعالیت بین المللی",
    ];

}
