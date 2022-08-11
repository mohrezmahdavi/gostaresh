<?php

namespace App\Exports\Gostaresh\StudentAdmissionCapacity;

use App\Models\Index\StudentAdmissionCapacity;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $studentAdmissionCapacities;
    private $count = 0;

    public function __construct($studentAdmissionCapacities)
    {
        $this->studentAdmissionCapacities = $studentAdmissionCapacities;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->studentAdmissionCapacities;
    }


    public function map($studentAdmissionCapacity): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $studentAdmissionCapacity?->province?->name . ' - ' . $studentAdmissionCapacity?->county?->name);

        if (filterCol('university_type_title') == true) {
            array_push($mapping, $studentAdmissionCapacity?->university_type_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $studentAdmissionCapacity?->gender_title);
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $studentAdmissionCapacity?->department_of_education_title);
        }
        if (filterCol('student_admission_capacities') == true) {
            array_push($mapping, $studentAdmissionCapacity?->student_admission_capacities);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $studentAdmissionCapacity?->year);
        }
        return $mapping;
    }



    public function headings(): array
    {
        $headings = ["#"];
        $filterColumnsCheckBoxes = StudentAdmissionCapacity::$filterColumnsCheckBoxes;
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
