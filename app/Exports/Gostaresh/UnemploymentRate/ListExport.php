<?php

namespace App\Exports\Gostaresh\UnemploymentRate;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $unemploymentRates;
    private $count = 0;

    public function __construct($unemploymentRates)
    {
        $this->unemploymentRates = $unemploymentRates;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->unemploymentRates;
    }

    public function map($unemploymentRate): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $unemploymentRate?->province?->name . ' - ' . $unemploymentRate->county?->name);

        if (filterCol('education_title') == true) {
            array_push($mapping, $unemploymentRate?->education_title);
        }
        if (filterCol('amount') == true) {
            array_push($mapping, $unemploymentRate?->amount);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $unemploymentRate?->year);
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
            array_push($headings, 'مقدار  نرخ بیکاری (درصد)');
        }

        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }

        return $headings;
    }
}
