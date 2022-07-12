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
       
        return [
            $this->count,
            $demographicChangesOfCity?->population,
            $demographicChangesOfCity?->immigration_rates,
            $demographicChangesOfCity?->growth_rate,
            $demographicChangesOfCity?->year,
            $demographicChangesOfCity?->month,
            $demographicChangesOfCity?->province?->name . ' - ' . $demographicChangesOfCity?->county?->name,
        ];
    }

    

    public function headings(): array
    {
        return [
            "#",
            'جمعیت',
            'نرخ مهاجرت',
            'نرخ رشد',
            'سال',
            'ماه',
            'موقعیت',
        ];
    }
}
