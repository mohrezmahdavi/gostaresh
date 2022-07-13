<?php

namespace App\Exports\Gostaresh\GeographicalLocationOfUnit;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $geographicalLocationOfUnits;
    private $count = 0;

    public function __construct($geographicalLocationOfUnits)
    {
        $this->geographicalLocationOfUnits = $geographicalLocationOfUnits;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->geographicalLocationOfUnits;
    }

    public function map($geographicalLocationOfUnit): array
    {
        $this->count = $this->count + 1;
       
        return [
            $this->count,
            $geographicalLocationOfUnit?->province?->name . ' - ' . $geographicalLocationOfUnit->county?->name,
            $geographicalLocationOfUnit?->unit_university,
            $geographicalLocationOfUnit?->university_building,
            $geographicalLocationOfUnit?->distance_from_population_density_of_city,
            $geographicalLocationOfUnit?->distance_from_center_of_province,
            $geographicalLocationOfUnit?->climate_type_and_weather_conditions_title,
            $geographicalLocationOfUnit?->distance_to_the_nearest_higher_education_center,
            $geographicalLocationOfUnit?->distance_to_the_nearest_unit_of_azad_university,
            $geographicalLocationOfUnit?->level_and_quality_of_access_title,
            $geographicalLocationOfUnit?->international_opportunities_geographical_location_title,
        ];
    }

    

    public function headings(): array
    {
        return [
            "#",
            'شهرستان ',
            'واحد دانشگاهی',
            'ساختمان واحد دانشگاهی',
            'فاصله از تراکم جمعیتی شهر',
            'فاصله از مرکز استان',
            'نوع اقلیم و شرایط آب و هوایی',
            'فاصله تا نزدیکترین مرکز آموزش عالی',
            'فاصله تا نزدیکترین واحد دانشگاه آزاد',
            'سطح و کیفیت دسترسی',
            'فرصت های بین الملی موقعیت جغرافیایی',
        ];
    }
}
