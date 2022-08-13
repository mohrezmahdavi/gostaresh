<?php

namespace App\Exports\Gostaresh\TuitionIncome;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $tuitionIncomes;
    private $count = 0;

    public function __construct($tuitionIncomes)
    {
        $this->tuitionIncomes = $tuitionIncomes;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->tuitionIncomes;
    }
   
    public function map($tuitionIncomes): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $tuitionIncomes?->province?->name . ' - ' . $tuitionIncomes?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $tuitionIncomes?->unit);
        }
        if (filterCol('university_type_title') == true) {
            array_push($mapping, $tuitionIncomes?->university_type_title );
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $tuitionIncomes?->department_of_education_title );
        }
        if (filterCol('associate_degree') == true) {
            array_push($mapping, number_format((int) $tuitionIncomes?->associate_degree ));
        }
        if (filterCol('bachelor_degree') == true) {
            array_push($mapping, number_format((int) $tuitionIncomes?->bachelor_degree ));
        }
        if (filterCol('masters') == true) {
            array_push($mapping, number_format((int) $tuitionIncomes?->masters ));
        }
        if (filterCol('phd') == true) {
            array_push($mapping, number_format((int) $tuitionIncomes?->phd ));
        }

        array_push($mapping, $tuitionIncomes?->year);

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
        if (filterCol('department_of_education_title') == true) {
            array_push($headings, 'گروه عمده تحصیلی');
        }
        if (filterCol('associate_degree') == true) {
            array_push($headings, 'کاردانی');
        }
        if (filterCol('bachelor_degree') == true) {
            array_push($headings, 'کارشناسی');
        }
        if (filterCol('masters') == true) {
            array_push($headings, 'کارشناسی ارشد');
        }
        if (filterCol('phd') == true) {
            array_push($headings, 'دکتری');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
