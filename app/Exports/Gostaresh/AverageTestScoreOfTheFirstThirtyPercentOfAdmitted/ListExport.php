<?php

namespace App\Exports\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds;

    public function __construct($averageTestScoreOfTheFirstThirtyPercentOfAdmitteds)
    {
        $this->averageTestScoreOfTheFirstThirtyPercentOfAdmitteds = $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->averageTestScoreOfTheFirstThirtyPercentOfAdmitteds;
    }

    public function map($averageTestScoreOfTheFirstThirtyPercentOfAdmitted): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->province?->name . ' - ' . $averageTestScoreOfTheFirstThirtyPercentOfAdmitted->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->department_of_education_title);
        }

        if (filterCol('average_test_score_of_the_first_thirty_percent_of_admitted') == true) {
            array_push($mapping, $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->average_test_score_of_the_first_thirty_percent_of_admitted);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $averageTestScoreOfTheFirstThirtyPercentOfAdmitted?->year);
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
        if (filterCol('average_test_score_of_the_first_thirty_percent_of_admitted') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }
}
