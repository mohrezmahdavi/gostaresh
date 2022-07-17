<?php

namespace App\Exports\Gostaresh\DemographicChangesOfCity;

use App\Models\Index\DemographicChangesOfCity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $demographicChangesOfCities;

    public function __construct($demographicChangesOfCities)
    {
        $this->demographicChangesOfCities = $demographicChangesOfCities;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->demographicChangesOfCities;
    }

    public function map($demographicChangesOfCity): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        if (filterCol('population') == true) {
            array_push($mapping, $demographicChangesOfCity?->population);
        }
        if (filterCol('immigration_rates') == true) {
            array_push($mapping, $demographicChangesOfCity?->immigration_rates);
        }
        if (filterCol('growth_rate') == true) {
            array_push($mapping, $demographicChangesOfCity?->growth_rate);
        }

        array_push($mapping, $demographicChangesOfCity?->year);
        array_push($mapping, $demographicChangesOfCity?->month);
        array_push($mapping, $demographicChangesOfCity?->province?->name . ' - ' . $demographicChangesOfCity?->county?->name);
        return $mapping;
    }



    public function headings(): array
    {
        $headings = ["#"];
        if (filterCol('population') == true) {
            array_push($headings, 'جمعیت');
        }
        if (filterCol('immigration_rates') == true) {
            array_push($headings, 'نرخ مهاجرت');
        }
        if (filterCol('growth_rate') == true) {
            array_push($headings, 'نرخ رشد');
        }


        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        array_push($headings, 'موقعیت');
        return $headings;
    }

}
