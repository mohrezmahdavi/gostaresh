<?php

namespace App\Exports\Gostaresh\RevenueChanges;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $revenueChanges;
    private $count = 0;

    public function __construct($revenueChanges)
    {
        $this->revenueChanges = $revenueChanges;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->revenueChanges;
    }
   
    public function map($revenueChanges): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $revenueChanges?->province?->name . ' - ' . $revenueChanges?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $revenueChanges?->unit);
        }
        if (filterCol('total_annual_income') == true) {
            array_push($mapping, number_format((int) $revenueChanges?->total_annual_income ));
        }

        array_push($mapping, $revenueChanges?->year);

        return $mapping;
    }
    
    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('total_annual_income') == true) {
            array_push($headings, 'کل درآمد های سالیانه');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
    
}
