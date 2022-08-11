<?php

namespace App\Exports\Gostaresh\NumberOfVolunteersStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $numberOfVolunteersStatusAnalyses;

    public function __construct($numberOfVolunteersStatusAnalyses)
    {
        $this->numberOfVolunteersStatusAnalyses = $numberOfVolunteersStatusAnalyses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberOfVolunteersStatusAnalyses;
    }

    public function map($numberOfVolunteersStatusAnalysis): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $numberOfVolunteersStatusAnalysis?->province?->name . ' - ' . $numberOfVolunteersStatusAnalysis->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $numberOfVolunteersStatusAnalysis?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $numberOfVolunteersStatusAnalysis?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $numberOfVolunteersStatusAnalysis?->department_of_education_title);
        }

        if (filterCol('number_of_volunteers') == true) {
            array_push($mapping, $numberOfVolunteersStatusAnalysis?->number_of_volunteers);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $numberOfVolunteersStatusAnalysis?->year);
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
        if (filterCol('number_of_volunteers') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }

}
