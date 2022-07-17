<?php

namespace App\Exports\Gostaresh\GDPPart;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $gdpParts;
    private $count = 0;

    public function __construct($gdpParts)
    {
        $this->gdpParts = $gdpParts;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->gdpParts;
    }

    public function map($gdpPart): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $gdpPart?->province?->name . ' - ' . $gdpPart?->county?->name);

        if (filterCol('amount') == true) {
            array_push($mapping, $gdpPart?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $gdpPart?->year);
        }
        array_push($mapping, $gdpPart?->month);

        return $mapping;
    }

    

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');
        
        if (filterCol('population') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('immigration_rates') == true) {
            array_push($headings, 'سال');
        }
        array_push($headings, 'ماه');

        return $headings;
    }
    
}
