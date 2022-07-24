<?php

namespace App\Exports\Gostaresh\CostOfMajors;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $costOfMajors;
    private $count = 0;

    public function __construct($costOfMajors)
    {
        $this->costOfMajors = $costOfMajors;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->costOfMajors;
    }
   
    public function map($costOfMajors): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $costOfMajors?->province?->name . ' - ' . $costOfMajors?->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $costOfMajors?->university_type_title);
        }
        if (filterCol('gender') == true) {
            array_push($mapping, $costOfMajors?->gender);
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $costOfMajors?->department_of_education_title);
        }
        if (filterCol('associate_degree') == true) {
            array_push($mapping, number_format((int) $costOfMajors?->associate_degree ));
        }
        if (filterCol('bachelor_degree') == true) {
            array_push($mapping, number_format((int) $costOfMajors?->bachelor_degree ));
        }
        if (filterCol('masters') == true) {
            array_push($mapping, number_format((int) $costOfMajors?->masters ));
        }
        if (filterCol('phd') == true) {
            array_push($mapping, number_format((int) $costOfMajors?->phd ));
        }

        array_push($mapping, $costOfMajors?->year);
        array_push($mapping, $costOfMajors?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('university_type_title') == true) {                                                       
            array_push($headings, 'دانشگاه');
        }
        if (filterCol('gender') == true) {                                 
            array_push($headings, 'جنسیت');
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
        array_push($headings, 'ماه');
        
        return $headings;
    }

}
