<?php

namespace App\Exports\Gostaresh\GrowthRateStudentPopulation;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $growthRateStudentPopulations;
    private $count = 0;

    public function __construct($growthRateStudentPopulations)
    {
        $this->growthRateStudentPopulations = $growthRateStudentPopulations;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->growthRateStudentPopulations;
    }

    public function map($growthRateStudentPopulation): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $growthRateStudentPopulation?->province?->name . ' - ' . $growthRateStudentPopulation?->county?->name);

        if (filterCol('gender_title') == true) {
            array_push($mapping, $growthRateStudentPopulation?->gender_title);
        }
        if (filterCol('ebtedai') == true) {
            array_push($mapping, $growthRateStudentPopulation?->ebtedai);
        }
        if (filterCol('motevasete_1') == true) {
            array_push($mapping, $growthRateStudentPopulation?->motevasete_1);
        }
        if (filterCol('motevasete_2_ensani') == true) {
            array_push($mapping, $growthRateStudentPopulation?->motevasete_2_ensani);
        }
        if (filterCol('motevasete_2_math') == true) {
            array_push($mapping, $growthRateStudentPopulation?->motevasete_2_math);
        }
        if (filterCol('motevasete_2_science') == true) {
            array_push($mapping, $growthRateStudentPopulation?->motevasete_2_science);
        }
        if (filterCol('motevasete_2_kar_danesh') == true) {
            array_push($mapping, $growthRateStudentPopulation?->motevasete_2_kar_danesh);
        }
        array_push($mapping, $growthRateStudentPopulation?->year);

        return $mapping;
    }

    

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('gender_title') == true) {
            array_push($headings, 'جنسیت');
        }
        if (filterCol('ebtedai') == true) {
            array_push($headings, 'ابتدایی');
        }
        if (filterCol('motevasete_1') == true) {
            array_push($headings, 'متوسطه اول');
        }
        if (filterCol('motevasete_2_ensani') == true) {
            array_push($headings, 'متوسطه دوم (علوم انسانی)');
        }
        if (filterCol('motevasete_2_math') == true) {
            array_push($headings, 'متوسطه دوم (ریاضی)');
        }
        if (filterCol('motevasete_2_science') == true) {
            array_push($headings, 'متوسطه دوم (علوم تجربی)');
        }
        if (filterCol('motevasete_2_kar_danesh') == true) {
            array_push($headings, 'متوسطه دوم (کار و دانش و فنی و حرفه ای)');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
