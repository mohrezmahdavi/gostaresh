<?php

namespace App\Exports\Gostaresh\NumberOfNonMedicalFieldsOfStudy2;

use App\Models\Index\NumberOfNonMedicalFieldsOfStudy2;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $numberOfNonMedicalFieldsOfStudies;
    private $count = 0;

    public function __construct($numberOfNonMedicalFieldsOfStudies)
    {
        $this->numberOfNonMedicalFieldsOfStudies = $numberOfNonMedicalFieldsOfStudies;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberOfNonMedicalFieldsOfStudies;
    }


    public function map($numberOfNonMedicalFieldsOfStudy): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->province?->name . ' - ' . $numberOfNonMedicalFieldsOfStudy?->county?->name);

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->department_of_education_title);
        }
        if (filterCol('kardani_peyvaste_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->kardani_peyvaste_count);
        }
        if (filterCol('kardani_na_peyvaste_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->kardani_na_peyvaste_count);
        }
        if (filterCol('karshenasi_peyvaste_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->karshenasi_peyvaste_count);
        }
        if (filterCol('karshenasi_na_peyvaste_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->karshenasi_na_peyvaste_count);
        }
        if (filterCol('karshenasi_arshad_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->karshenasi_arshad_count);
        }
        if (filterCol('docktora_herfei_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->docktora_herfei_count);
        }
        if (filterCol('docktora_takhasosi_count') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->docktora_takhasosi_count);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $numberOfNonMedicalFieldsOfStudy?->year);
        }
        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy2::$filterColumnsCheckBoxes;
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
