<?php

namespace App\Exports\Gostaresh\NumberOfStudentsStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $numberOfStudentsStatusAnalysises;

    public function __construct($numberOfStudentsStatusAnalysises)
    {
        $this->numberOfStudentsStatusAnalysises = $numberOfStudentsStatusAnalysises;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->numberOfStudentsStatusAnalysises;
    }

    public function map($numberOfStudentsStatusAnalysis): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $numberOfStudentsStatusAnalysis?->province?->name . ' - ' . $numberOfStudentsStatusAnalysis->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $numberOfStudentsStatusAnalysis?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $numberOfStudentsStatusAnalysis?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $numberOfStudentsStatusAnalysis?->department_of_education_title);
        }

        if (filterCol('number_of_students') == true) {
            array_push($mapping, $numberOfStudentsStatusAnalysis?->number_of_students);
        }

//        if (filterCol('grade_id') == true) {
//            array_push($mapping, $numberOfStudentsStatusAnalysis?->grade?->name);
//        }
//        if (filterCol('major_id') == true) {
//            array_push($mapping, $numberOfStudentsStatusAnalysis?->major?->name);
//        }
//        if (filterCol('minor_id') == true) {
//            array_push($mapping, $numberOfStudentsStatusAnalysis?->minor?->name);
//        }

        if (filterCol('year') == true) {
            array_push($mapping, $numberOfStudentsStatusAnalysis?->year);
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
        if (filterCol('number_of_students') == true) {
            array_push($headings, 'تعداد دانشجویان');
        }
//        if (filterCol('grade_id') == true) {
//            array_push($headings, 'مقطع');
//        }
//        if (filterCol('major_id') == true) {
//            array_push($headings, 'رشته');
//        }
//        if (filterCol('minor_id') == true) {
//            array_push($headings, 'گرایش');
//        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }
}
