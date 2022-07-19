<?php

namespace App\Exports\Gostaresh\EconomicParticipationRate;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $economicParticipationRates;
    private $count = 0;

    public function __construct($economicParticipationRates)
    {
        $this->economicParticipationRates = $economicParticipationRates;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->economicParticipationRates;
    }

    public function map($economicParticipationRate): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $economicParticipationRate?->province?->name . ' - ' . $economicParticipationRate->county?->name);

        if (filterCol('education_title') == true) {
            array_push($mapping, $economicParticipationRate?->education_title);
        }
        if (filterCol('amount') == true) {
            array_push($mapping, $economicParticipationRate?->amount);
        }

        if (filterCol('year') == true) {
            array_push($mapping, $economicParticipationRate?->year);
        }

        return $mapping;
    }

    

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');
        
        if (filterCol('education_title') == true) {
            array_push($headings, 'تحصیلات');
        }
        if (filterCol('amount') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }

        return $headings;
    }
}
