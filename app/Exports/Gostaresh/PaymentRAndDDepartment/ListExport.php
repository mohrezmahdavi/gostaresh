<?php

namespace App\Exports\Gostaresh\PaymentRAndDDepartment;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $paymentRAndDDepartments;
    private $count = 0;

    public function __construct($paymentRAndDDepartments)
    {
        $this->paymentRAndDDepartments = $paymentRAndDDepartments;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->paymentRAndDDepartments;
    }

    public function map($paymentRAndDDepartment): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $paymentRAndDDepartment?->province?->name . ' - ' . $paymentRAndDDepartment?->county?->name);

        if (filterCol('amount') == true) {
            array_push($mapping, $paymentRAndDDepartment?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $paymentRAndDDepartment?->year);
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
