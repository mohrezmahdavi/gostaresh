<?php

namespace App\Exports\Gostaresh\NumberOfAdmissionsStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $numberOfAdmissionsStatusAnalysises;

    public function __construct($numberOfAdmissionsStatusAnalysises)
    {
        $this->numberOfAdmissionsStatusAnalysises = $numberOfAdmissionsStatusAnalysises;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberOfAdmissionsStatusAnalysises;
    }

    public function map($numberOfAdmissionsStatusAnalysis): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $numberOfAdmissionsStatusAnalysis?->province?->name . ' - ' . $numberOfAdmissionsStatusAnalysis->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $numberOfAdmissionsStatusAnalysis?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $numberOfAdmissionsStatusAnalysis?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $numberOfAdmissionsStatusAnalysis?->department_of_education_title);
        }

        if (filterCol('number_of_admissions') == true) {
            array_push($mapping, $numberOfAdmissionsStatusAnalysis?->number_of_admissions);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $numberOfAdmissionsStatusAnalysis?->year);
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
        if (filterCol('number_of_admissions') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }
}
