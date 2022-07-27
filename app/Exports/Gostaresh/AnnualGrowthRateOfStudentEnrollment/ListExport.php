<?php

namespace App\Exports\Gostaresh\AnnualGrowthRateOfStudentEnrollment;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $annualGrowthRateOfStudentEnrollments;

    public function __construct($annualGrowthRateOfStudentEnrollments)
    {
        $this->annualGrowthRateOfStudentEnrollments = $annualGrowthRateOfStudentEnrollments;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->annualGrowthRateOfStudentEnrollments;
    }

    public function map($annualGrowthRateOfStudentEnrollment): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $annualGrowthRateOfStudentEnrollment?->province?->name . ' - ' . $annualGrowthRateOfStudentEnrollment->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $annualGrowthRateOfStudentEnrollment?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $annualGrowthRateOfStudentEnrollment?->gender_title);
        }

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $annualGrowthRateOfStudentEnrollment?->department_of_education_title);
        }

        if (filterCol('annual_growth_rate_of_student_enrollment') == true) {
            array_push($mapping, $annualGrowthRateOfStudentEnrollment?->annual_growth_rate_of_student_enrollment);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $annualGrowthRateOfStudentEnrollment?->year);
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
        if (filterCol('annual_growth_rate_of_student_enrollment') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }
}
