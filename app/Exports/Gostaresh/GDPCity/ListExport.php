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
        $mapping = [$this->count];
        array_push($mapping, $gdpCity?->province?->name . ' - ' . $gdpCity?->county?->name);

        if (filterCol('amount') == true) {
            array_push($mapping, $gdpCity?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $gdpCity?->year);
        }

        return $mapping;
    }

    

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');
        
        if (filterCol('amount') == true) {
            array_push($headings, 'سهم تولید ناخالصی داخلی شهرستان (درصد)');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }

        return $headings;
    }
}
