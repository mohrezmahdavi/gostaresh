<?php

namespace App\Exports\Gostaresh\PercapitaRevenue;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $percapitaRevenues;
    private $count = 0;

    public function __construct($percapitaRevenues)
    {
        $this->percapitaRevenues = $percapitaRevenues;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->percapitaRevenues;
    }
   
    public function map($percapitaRevenues): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $percapitaRevenues?->province?->name . ' - ' . $percapitaRevenues?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $percapitaRevenues?->unit);
        }
        if (filterCol('university_type_title') == true) {
            array_push($mapping, $percapitaRevenues?->university_type_title );
        }
        if (filterCol('grade_title') == true) {
            array_push($mapping, $percapitaRevenues?->grade_title );
        }
        if (filterCol('percapita_revenue_status_analyses') == true) {
            array_push($mapping, $percapitaRevenues?->percapita_revenue_status_analyses );
        }

        array_push($mapping, $percapitaRevenues?->year);

        return $mapping;
    }
    
    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('university_type_title') == true) {
            array_push($headings, 'دانشگاه');
        }
        if (filterCol('grade_title') == true) {
            array_push($headings, 'مقطع تحصیلی');
        }
        if (filterCol('percapita_revenue_status_analyses') == true) {
            array_push($headings, 'تحلیل وضعیت درآمد سرانه');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
