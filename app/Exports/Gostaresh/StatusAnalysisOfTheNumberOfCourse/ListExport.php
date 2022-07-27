<?php

namespace App\Exports\Gostaresh\StatusAnalysisOfTheNumberOfCourse;

use App\Models\Index\StatusAnalysisOfTheNumberOfCourse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $statusAnalysisOfTheNumberOfCourses;
    private $count = 0;

    public function __construct($statusAnalysisOfTheNumberOfCourses)
    {
        $this->statusAnalysisOfTheNumberOfCourses = $statusAnalysisOfTheNumberOfCourses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->statusAnalysisOfTheNumberOfCourses;
    }


    public function map($statusAnalysisOfTheNumberOfCourse): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCourse?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->unit);
        }
        if (filterCol('total_number_of_courses') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->total_number_of_courses);
        }
        if (filterCol('number_of_international_Persian_language_courses_in_person') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->number_of_international_Persian_language_courses_in_person);
        }
        if (filterCol('number_of_international_virtual_Persian_language_courses') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->number_of_international_virtual_Persian_language_courses);
        }
        if (filterCol('number_of_international_courses_in_the_target_language_in_person') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_in_person);
        }
        if (filterCol('number_of_international_courses_in_the_target_language_virtually') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->number_of_international_courses_in_the_target_language_virtually);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCourse?->year);
        }

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        $filterColumnsCheckBoxes = StatusAnalysisOfTheNumberOfCourse::$filterColumnsCheckBoxes;
        array_push($headings, 'شهرستان');
        foreach ($filterColumnsCheckBoxes as $key => $value)
        {
            if (filterCol($key))
            {
                array_push($headings, $value);
            }
        }     
        return $headings;
    }
}
