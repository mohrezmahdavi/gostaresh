<?php

namespace App\Exports\Gostaresh\NumberOfInternationalCourse;

use App\Models\Index\NumberOfInternationalCourse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $numberOfInternationalCourses;
    private $count = 0;

    public function __construct($numberOfInternationalCourses)
    {
        $this->numberOfInternationalCourses = $numberOfInternationalCourses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberOfInternationalCourses;
    }


    public function map($numberOfInternationalCourse): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $numberOfInternationalCourse?->province?->name . ' - ' . $numberOfInternationalCourse?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $numberOfInternationalCourse?->unit);
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $numberOfInternationalCourse?->department_of_education_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $numberOfInternationalCourse?->gender_title);
        }
        if (filterCol('kardani_count') == true) {
            array_push($mapping, $numberOfInternationalCourse?->kardani_count);
        }
        if (filterCol('karshenasi_count') == true) {
            array_push($mapping, $numberOfInternationalCourse?->karshenasi_count);
        }
        if (filterCol('karshenasi_arshad_count') == true) {
            array_push($mapping, $numberOfInternationalCourse?->karshenasi_arshad_count);
        }
        if (filterCol('docktora_count') == true) {
            array_push($mapping, $numberOfInternationalCourse?->docktora_count);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $numberOfInternationalCourse?->year);
        }

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        $filterColumnsCheckBoxes = NumberOfInternationalCourse::$filterColumnsCheckBoxes;
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
