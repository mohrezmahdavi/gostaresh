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
        $mapping = [$this->count];
        array_push($mapping, $geographicalLocationOfUnit?->province?->name . ' - ' . $geographicalLocationOfUnit?->county?->name);

        if (filterCol('unit_university') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->unit_university);
        }
        if (filterCol('university_building') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->university_building);
        }
        if (filterCol('distance_from_population_density_of_city') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->distance_from_population_density_of_city);
        }
        if (filterCol('distance_from_center_of_province') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->distance_from_center_of_province);
        }
        if (filterCol('climate_type_and_weather_conditions_title') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->climate_type_and_weather_conditions_title);
        }
        if (filterCol('distance_to_the_nearest_higher_education_center') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->distance_to_the_nearest_higher_education_center);
        }
        if (filterCol('distance_to_the_nearest_unit_of_azad_university') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->distance_to_the_nearest_unit_of_azad_university);
        }
        if (filterCol('level_and_quality_of_access_title') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->level_and_quality_of_access_title);
        }
        if (filterCol('international_opportunities_geographical_location_title') == true) {
            array_push($mapping, $geographicalLocationOfUnit?->international_opportunities_geographical_location_title);
        }

        array_push($mapping, $geographicalLocationOfUnit?->year);
        array_push($mapping, $geographicalLocationOfUnit?->province?->name . ' - ' . $geographicalLocationOfUnit?->county?->name);
        return $mapping;
    }



    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit_university') == true) {
            array_push($headings, 'واحد دانشگاهی');
        }
        if (filterCol('university_building') == true) {
            array_push($headings, 'ساختمان واحد دانشگاهی');
        }
        if (filterCol('distance_from_population_density_of_city') == true) {
            array_push($headings, 'فاصله از تراکم جمعیتی شهر');
        }
        if (filterCol('distance_from_center_of_province') == true) {
            array_push($headings, 'فاصله از مرکز استان');
        }
        if (filterCol('climate_type_and_weather_conditions_title') == true) {
            array_push($headings, 'نوع اقلیم و شرایط آب و هوایی');
        }
        if (filterCol('distance_to_the_nearest_higher_education_center') == true) {
            array_push($headings, 'فاصله تا نزدیکترین مرکز آموزش عالی');
        }
        if (filterCol('distance_to_the_nearest_unit_of_azad_university') == true) {
            array_push($headings, 'فاصله تا نزدیکترین واحد دانشگاه آزاد');
        }
        if (filterCol('level_and_quality_of_access_title') == true) {
            array_push($headings, 'سطح و کیفیت دسترسی');
        }
        if (filterCol('international_opportunities_geographical_location_title') == true) {
            array_push($headings, 'فرصت های بین الملی موقعیت جغرافیایی');
        }
        array_push($headings, 'سال');
        array_push($headings, 'موقعیت');
        return $headings;
    }
}
