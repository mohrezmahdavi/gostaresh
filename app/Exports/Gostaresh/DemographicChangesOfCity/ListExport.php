<?php

namespace App\Exports\Gostaresh\DemographicChangesOfCity;

use App\Models\Index\DemographicChangesOfCity;
use Facades\Verta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $demographicChangesOfCities;

    private $arr;

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
        $arr = [$this->count];
        if (filterCol('population') == true) {
            array_push($arr, $demographicChangesOfCity?->population);
        }
        if (filterCol('immigration_rates') == true) {
            array_push($arr, $demographicChangesOfCity?->immigration_rates);
        }
        if (filterCol('growth_rate') == true) {
            array_push($arr, $demographicChangesOfCity?->growth_rate);
        }

        array_push($arr, $demographicChangesOfCity?->year);
        array_push($arr, $demographicChangesOfCity?->month);
        array_push($arr, $demographicChangesOfCity?->province?->name . ' - ' . $demographicChangesOfCity?->county?->name);
        return $arr;
    }

    

    public function headings(): array
    {
        $arr = ["#"];
        if (filterCol('population') == true) {
            array_push($arr, 'جمعیت');
        }
        if (filterCol('immigration_rates') == true) {
            array_push($arr, 'نرخ مهاجرت');
        }
        if (filterCol('growth_rate') == true) {
            array_push($arr, 'نرخ رشد');
        }


        array_push($arr, 'سال');
        array_push($arr, 'ماه');
        array_push($arr, 'موقعیت');
        return $arr;
    }
}
