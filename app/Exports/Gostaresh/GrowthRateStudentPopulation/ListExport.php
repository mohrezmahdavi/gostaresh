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
       
        return [
            $this->count,
            $growthRateStudentPopulation?->province?->name . ' - ' . $growthRateStudentPopulation->county?->name,
            $growthRateStudentPopulation?->gender_title,
            $growthRateStudentPopulation?->ebtedai,
            $growthRateStudentPopulation?->motevasete_1,
            $growthRateStudentPopulation?->motevasete_2_ensani,
            $growthRateStudentPopulation?->motevasete_2_math,
            $growthRateStudentPopulation?->motevasete_2_science,
            $growthRateStudentPopulation?->motevasete_2_kar_danesh,
        ];
    }

    

    public function headings(): array
    {
        return [
            "#",
            'شهرستان ',
            'جنسیت',
            'ابتدایی',
            'متوسطه اول',
            'متوسطه دوم (علوم انسانی)',
            'متوسطه دوم (ریاضی)',
            'متوسطه دوم (علوم تجربی)',
            'متوسطه دوم (کار و دانش و فنی و حرفه ای)',
        ];
    }
}
