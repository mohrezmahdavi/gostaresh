<?php

namespace App\Exports\Gostaresh\EmploymentOfProvincial;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $employmentOfProvincials;
    private $count = 0;

    public function __construct($employmentOfProvincials)
    {
        $this->employmentOfProvincials = $employmentOfProvincials;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->employmentOfProvincials;
    }

    public function map($employmentOfProvincial): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $employmentOfProvincial?->province?->name . ' - ' . $employmentOfProvincial?->county?->name);

        if (filterCol('agriculture_hunting_forestry') == true) {
            array_push($mapping, $employmentOfProvincial?->agriculture_hunting_forestry);
        }
        if (filterCol('mining_construction') == true) {
            array_push($mapping, $employmentOfProvincial?->mining_construction);
        }

        if (filterCol('water_electricity_natural_gas_supply') == true) {
            array_push($mapping, $employmentOfProvincial?->water_electricity_natural_gas_supply);
        }

        if (filterCol('building') == true) {
            array_push($mapping, $employmentOfProvincial?->building);
        }

        if (filterCol('wholesale_retail_vehicle_repair_supply') == true) {
            array_push($mapping, $employmentOfProvincial?->wholesale_retail_vehicle_repair_supply);
        }

        if (filterCol('hotel_and_restaurant') == true) {
            array_push($mapping, $employmentOfProvincial?->hotel_and_restaurant);
        }

        if (filterCol('transportation_warehousing_communications') == true) {
            array_push($mapping, $employmentOfProvincial?->transportation_warehousing_communications);
        }

        if (filterCol('financial_intermediation') == true) {
            array_push($mapping, $employmentOfProvincial?->financial_intermediation);
        }

        if (filterCol('office_of_public_affairs_urban_services') == true) {
            array_push($mapping, $employmentOfProvincial?->office_of_public_affairs_urban_services);
        }

        if (filterCol('education') == true) {
            array_push($mapping, $employmentOfProvincial?->education);
        }

        if (filterCol('health_and_social_work') == true) {
            array_push($mapping, $employmentOfProvincial?->health_and_social_work);
        }

        if (filterCol('activities_of_employed_households') == true) {
            array_push($mapping, $employmentOfProvincial?->activities_of_employed_households);
        }

        if (filterCol('overseas_organizations_and_delegations') == true) {
            array_push($mapping, $employmentOfProvincial?->overseas_organizations_and_delegations);
        }

        if (filterCol('real_estates') == true) {
            array_push($mapping, $employmentOfProvincial?->real_estates);
        }

        if (filterCol('professional_scientific_technical_activities') == true) {
            array_push($mapping, $employmentOfProvincial?->professional_scientific_technical_activities);
        }

        if (filterCol('office_and_support_services') == true) {
            array_push($mapping, $employmentOfProvincial?->office_and_support_services);
        }

        if (filterCol('art_and_entertainment') == true) {
            array_push($mapping, $employmentOfProvincial?->art_and_entertainment);
        }

        if (filterCol('other_services') == true) {
            array_push($mapping, $employmentOfProvincial?->other_services);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $employmentOfProvincial?->year);
        }

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');
        
        if (filterCol('agriculture_hunting_forestry') == true) {
            array_push($headings, ' کشاورزی، شکار و جنگلداری');
        }
        if (filterCol('mining_construction') == true) {
            array_push($headings, 'استخراج معدن - ساخت');
        }

        if (filterCol('water_electricity_natural_gas_supply') == true) {
            array_push($headings, 'تامین آب، برق و گاز طبیعی');
        }

        if (filterCol('building') == true) {
            array_push($headings, 'ساختمان');
        }

        if (filterCol('wholesale_retail_vehicle_repair_supply') == true) {
            array_push($headings, 'عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا');
        }

        if (filterCol('hotel_and_restaurant') == true) {
            array_push($headings, ' هتل و رسنوران');
        }

        if (filterCol('transportation_warehousing_communications') == true) {
            array_push($headings, ' حمل و نقل، انبارداری و ارتباطات');
        }

        if (filterCol('financial_intermediation') == true) {
            array_push($headings, 'واسطه گری های مالی');
        }

        if (filterCol('office_of_public_affairs_urban_services') == true) {
            array_push($headings, 'اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی');
        }

        if (filterCol('education') == true) {
            array_push($headings, 'آموزش');
        }

        if (filterCol('health_and_social_work') == true) {
            array_push($headings, 'بهداشت و مددکاری اجتماعی');
        }

        if (filterCol('activities_of_employed_households') == true) {
            array_push($headings, 'فعالیت های خانوارهای دارای مستخدم');
        }

        if (filterCol('overseas_organizations_and_delegations') == true) {
            array_push($headings, 'سازمان ها و هیات های برون مرزی');
        }

        if (filterCol('real_estates') == true) {
            array_push($headings, 'املاک و مستغلات');
        }

        if (filterCol('professional_scientific_technical_activities') == true) {
            array_push($headings, 'فعالیت های حرفه ای ، علمی و فنی');
        }

        if (filterCol('office_and_support_services') == true) {
            array_push($headings, 'اداری و خدمات پشتیبانی');
        }

        if (filterCol('art_and_entertainment') == true) {
            array_push($headings, 'هنر و سرگرمی');
        }

        if (filterCol('other_services') == true) {
            array_push($headings, ' سایر خدمات');
        }

        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }

        return $headings;
    }
}
