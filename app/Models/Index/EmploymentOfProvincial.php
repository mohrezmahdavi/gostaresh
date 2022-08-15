<?php

namespace App\Models\Index;

use App\Models\City;
use App\Models\Country;
use App\Models\County;
use App\Models\Province;
use App\Models\RuralDistrict;
use App\Services\Model\FilterProvince;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 12 Model
class EmploymentOfProvincial extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_employment_of_provincial';

    protected $guarded = [''];

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
        $query = filterByOwnProvince($query);

        FilterProvince::filter($query);

        if (request('start_date'))
        {
            $startDateJ = verta(request('start_date'));
            $startMonth = (int)$startDateJ->format('n');
            $startYear = (int)$startDateJ->format('Y');
            $query->where('year', '>', $startYear)->orWhere(function ($query) use ($startYear, $startMonth) {
                $query->where('year', $startYear)->where('month', '>', $startMonth);
            });
        }

        if (request('end_date'))
        {
            $endDateJ = verta(request('end_date'));
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

        return $query;
    }

    public static $filterColumnsCheckBoxes = [
        //"field"      => "title"
        "agriculture_hunting_forestry"                 => "کشاورزی، شکار و جنگلداری",
        "mining_construction"                          => "استخراج معدن - ساخت",
        "water_electricity_natural_gas_supply"         => "تامین آب، برق و گاز طبیعی",
        "building"                                     => "ساختمان",
        "wholesale_retail_vehicle_repair_supply"       => "عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا",
        "hotel_and_restaurant"                         => "هتل و رسنوران",
        "transportation_warehousing_communications"    => "حمل و نقل، انبارداری و ارتباطات",
        "financial_intermediation"                     => "واسطه گری های مالی",
        "office_of_public_affairs_urban_services"      => "اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی",
        "education"                                    => "آموزش",
        "health_and_social_work"                       => "بهداشت و مددکاری اجتماعی",
        "activities_of_employed_households"            => "فعالیت های خانوارهای دارای مستخدم",
        "overseas_organizations_and_delegations"       => "سازمان ها و هیات های برون مرزی",
        "real_estates"                                 => "املاک و مستغلات",
        "professional_scientific_technical_activities" => "فعالیت های حرفه ای ، علمی و فنی",
        "office_and_support_services"                  => "اداری و خدمات پشتیبانی",
        "art_and_entertainment"                        => "هنر و سرگرمی",
        "other_services"                               => "سایر خدمات",
        "year"                                         => "سال",

    ];
}
