<?php

namespace App\Exports\Gostaresh\CostChangesTrends;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $costChangesTrends;
    private $count = 0;

    public function __construct($costChangesTrends)
    {
        $this->costChangesTrends = $costChangesTrends;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->costChangesTrends;
    }
   
    public function map($costChangesTrends): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $costChangesTrends?->province?->name . ' - ' . $costChangesTrends?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $costChangesTrends?->unit);
        }
        if (filterCol('total_annual_expenses') == true) {
            array_push($mapping, $costChangesTrends?->total_annual_expenses);
        }

        array_push($mapping, $costChangesTrends?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {                                                       
            array_push($headings, 'واحد');
        }
        if (filterCol('total_annual_expenses') == true) {                                 
            array_push($headings, 'کل هزینه های سالیانه');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }

}
