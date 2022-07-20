<?php

namespace App\Exports\Gostaresh\GraduatesOfHigherEducation;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $graduatesOfHigherEducation;
    private $count = 0;

    public function __construct($graduatesOfHigherEducation)
    {
        $this->graduatesOfHigherEducation = $graduatesOfHigherEducation;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->graduatesOfHigherEducation;
    }


    public function map($graduatesOfHigherEducation): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $graduatesOfHigherEducation?->province?->name . ' - ' . $graduatesOfHigherEducation?->county?->name);

        if (filterCol('university') == true) {
            array_push($mapping, $graduatesOfHigherEducation?->university);
        }
        if (filterCol('gender') == true) {
            array_push($mapping, $graduatesOfHigherEducation?->gender);
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $graduatesOfHigherEducation?->department_of_education_title);
        }
        if (filterCol('associate_degree') == true) {
            array_push($mapping, $graduatesOfHigherEducation?->associate_degree);
        }
        if (filterCol('bachelor_degree') == true) {
            array_push($mapping, $graduatesOfHigherEducation?->bachelor_degree);
        }
        if (filterCol('masters') == true) {
            array_push($mapping, $graduatesOfHigherEducation?->masters);
        }
        array_push($mapping, $graduatesOfHigherEducation?->year);
        array_push($mapping, $graduatesOfHigherEducation?->month);

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('university') == true) {
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

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
}