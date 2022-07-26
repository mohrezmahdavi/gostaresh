<?php

namespace App\Exports\Gostaresh\InternationalStudentGrowthRate;

use App\Models\Index\InternationalStudentGrowthRate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $internationalStudentGrowthRates;
    private $count = 0;

    public function __construct($internationalStudentGrowthRates)
    {
        $this->internationalStudentGrowthRates = $internationalStudentGrowthRates;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->internationalStudentGrowthRates;
    }


    public function map($internationalStudentGrowthRate): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $internationalStudentGrowthRate?->province?->name . ' - ' . $internationalStudentGrowthRate?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->unit);
        }
        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->department_of_education_title);
        }
        if (filterCol('gender_title') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->gender_title);
        }
        if (filterCol('kardani_count') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->kardani_count);
        }
        if (filterCol('karshenasi_count') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->karshenasi_count);
        }
        if (filterCol('karshenasi_arshad_count') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->karshenasi_arshad_count);
        }
        if (filterCol('docktora_count') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->docktora_count);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $internationalStudentGrowthRate?->year);
        }

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        $filterColumnsCheckBoxes = InternationalStudentGrowthRate::$filterColumnsCheckBoxes;
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
