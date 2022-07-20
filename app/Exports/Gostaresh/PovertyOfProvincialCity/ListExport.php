<?php

namespace App\Exports\Gostaresh\PovertyOfProvincialCity;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{

    private $povertyOfProvincialCities;
    private $count = 0;

    public function __construct($povertyOfProvincialCities)
    {
        $this->povertyOfProvincialCities = $povertyOfProvincialCities;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->povertyOfProvincialCities;
    }

    public function map($povertyOfProvincialCity): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];

        array_push($mapping, $povertyOfProvincialCity?->province?->name . ' - ' . $povertyOfProvincialCity?->county?->name);

        if (filterCol('amount') == true) {
            array_push($mapping, $povertyOfProvincialCity?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $povertyOfProvincialCity?->year);
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
