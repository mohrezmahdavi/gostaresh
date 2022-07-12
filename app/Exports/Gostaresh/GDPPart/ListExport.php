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
       
        return [
            $this->count,
            $gdpPart?->province?->name . ' - ' . $gdpPart->county?->name,
            $gdpPart?->amount,
            $gdpPart?->year,
           
        ];
    }

    

    public function headings(): array
    {
        return [
            "#",
            'شهرستان ',
            'مقدار',
            'سال',
        ];
    }
}
