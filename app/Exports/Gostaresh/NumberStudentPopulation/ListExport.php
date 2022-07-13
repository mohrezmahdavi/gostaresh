<?php

namespace App\Exports\Gostaresh\NumberStudentPopulation;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $numberStudentPopulations;
    private $count = 0;

    public function __construct($numberStudentPopulations)
    {
        $this->numberStudentPopulations = $numberStudentPopulations;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberStudentPopulations;
    }

    public function map($numberStudentPopulation): array
    {
        $this->count = $this->count + 1;
       
        return [
            $this->count,
            $numberStudentPopulation?->province?->name . ' - ' . $numberStudentPopulation->county?->name,
            $numberStudentPopulation?->gender_title,
            $numberStudentPopulation?->ebtedai,
            $numberStudentPopulation?->motevasete_1,
            $numberStudentPopulation?->motevasete_2_ensani,
            $numberStudentPopulation?->motevasete_2_math,
            $numberStudentPopulation?->motevasete_2_science,
            $numberStudentPopulation?->motevasete_2_kar_danesh,
            $numberStudentPopulation?->year,
            $numberStudentPopulation?->month,
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
            'سال',
            'ماه',
        ];
    }
}
