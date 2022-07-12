<?php

namespace App\Exports\Gostaresh\GDPCity;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $gdpCities;
    private $count = 0;

    public function __construct($gdpCities)
    {
        $this->gdpCities = $gdpCities;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->gdpCities;
    }

    public function map($gdpCity): array
    {
        $this->count = $this->count + 1;
       
        return [
            $this->count,
            $gdpCity?->province?->name . ' - ' . $gdpCity->county?->name,
            $gdpCity?->amount,
            $gdpCity?->year,
           
        ];
    }

    

    public function headings(): array
    {
        return [
            "#",
            'شهرستان ',
            'مقدار'.
            'سال',
        ];
    }
}
