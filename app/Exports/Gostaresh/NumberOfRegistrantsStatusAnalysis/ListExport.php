<?php

namespace App\Exports\Gostaresh\NumberOfRegistrantsStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $numberOfRegistrants;

    public function __construct($numberOfRegistrants)
    {
        $this->numberOfRegistrants = $numberOfRegistrants;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberOfRegistrants;
    }

    public function map($numberOfRegistrant): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $numberOfRegistrant?->province?->name . ' - ' . $numberOfRegistrant->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $numberOfRegistrant?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $numberOfRegistrant?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $numberOfRegistrant?->department_of_education_title);
        }

        if (filterCol('number_of_registrants') == true) {
            array_push($mapping, $numberOfRegistrant?->number_of_registrants);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $numberOfRegistrant?->year);
        }

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('university_type_title') == true) {
            array_push($headings, 'دانشگاه');
        }
        if (filterCol('gender_title') == true) {
            array_push($headings, 'جنسیت');
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($headings, 'گروه عمده تحصیلی');
        }
        if (filterCol('number_of_registrants') == true) {
            array_push($headings, 'تعداد ثبت نام شدگان');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }
}
