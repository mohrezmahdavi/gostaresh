<?php

namespace App\Exports\Gostaresh\IndustrialExpenditureResearch;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{

    private $industrialExpenditureResearches;
    private $count = 0;

    public function __construct($industrialExpenditureResearches)
    {
        $this->industrialExpenditureResearches = $industrialExpenditureResearches;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->industrialExpenditureResearches;
    }

    public function map($industrialExpenditureResearch): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];

        array_push($mapping, $industrialExpenditureResearch?->province?->name . ' - ' . $industrialExpenditureResearch?->county?->name);

        if (filterCol('amount') == true) {
            array_push($mapping, $industrialExpenditureResearch?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $industrialExpenditureResearch?->year);
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
