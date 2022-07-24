<?php

namespace App\Exports\Gostaresh\MultipleDeprivationIndexOfCity;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{

    private $multipleDeprivationIndexOfCities;
    private $count = 0;

    public function __construct($multipleDeprivationIndexOfCities)
    {
        $this->multipleDeprivationIndexOfCities = $multipleDeprivationIndexOfCities;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->multipleDeprivationIndexOfCities;
    }

    public function map($multipleDeprivationIndexOfCity): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];

        array_push($mapping, $multipleDeprivationIndexOfCity?->province?->name . ' - ' . $multipleDeprivationIndexOfCity?->county?->name);

        if (filterCol('amount') == true) {
            array_push($mapping, $multipleDeprivationIndexOfCity?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $multipleDeprivationIndexOfCity?->year);
        }
       
        return $mapping;
    }



    public function headings(): array
    {
        $headings = ["#"];

        array_push($headings, 'شهرستان');

        if (filterCol('amount') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        
        return $headings;
    }
}
