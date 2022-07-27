<?php

namespace App\Exports\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmitted;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $averageTestScoreOfTheLastFivePercentOfAdmitteds;

    public function __construct($averageTestScoreOfTheLastFivePercentOfAdmitteds)
    {
        $this->averageTestScoreOfTheLastFivePercentOfAdmitteds = $averageTestScoreOfTheLastFivePercentOfAdmitteds;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->averageTestScoreOfTheLastFivePercentOfAdmitteds;
    }

    public function map($averageTestScoreOfTheLastFivePercentOfAdmitted): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $averageTestScoreOfTheLastFivePercentOfAdmitted?->province?->name . ' - ' . $averageTestScoreOfTheLastFivePercentOfAdmitted->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $averageTestScoreOfTheLastFivePercentOfAdmitted?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $averageTestScoreOfTheLastFivePercentOfAdmitted?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $averageTestScoreOfTheLastFivePercentOfAdmitted?->department_of_education_title);
        }

        if (filterCol('average_test_score_of_the_last_five_percent_of_admitted') == true) {
            array_push($mapping, $averageTestScoreOfTheLastFivePercentOfAdmitted?->average_test_score_of_the_last_five_percent_of_admitted);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $averageTestScoreOfTheLastFivePercentOfAdmitted?->year);
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
        if (filterCol('average_test_score_of_the_last_five_percent_of_admitted') == true) {
            array_push($headings, "مقدار میانگین رتبه آزمون 5 درصد آخر پذیرفته شدگان");
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }
}
