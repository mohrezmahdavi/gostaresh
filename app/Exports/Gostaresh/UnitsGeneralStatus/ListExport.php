<?php

namespace App\Exports\Gostaresh\UnitsGeneralStatus;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $unitsGeneralStatuses;
    private $count = 0;

    public function __construct($unitsGeneralStatuses)
    {
        $this->unitsGeneralStatuses = $unitsGeneralStatuses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->unitsGeneralStatuses;
    }
   
    public function map($unitsGeneralStatuses): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $unitsGeneralStatuses?->province?->name . ' - ' . $unitsGeneralStatuses?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $unitsGeneralStatuses?->unit);
        }
        if (filterCol('degree/rank') == true) {
            array_push($mapping, $unitsGeneralStatuses['degree/rank']);
        }
        if (filterCol('score') == true) {
            array_push($mapping, $unitsGeneralStatuses?->score);
        }
        if (filterCol('established_year') == true) {
            array_push($mapping, $unitsGeneralStatuses?->established_year);
        }
        if (filterCol('approved_number_and_titles_of_the_faculty') == true) {
            array_push($mapping, $unitsGeneralStatuses?->approved_number_and_titles_of_the_faculty);
        }

        array_push($mapping, $unitsGeneralStatuses?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {                                                       
            array_push($headings, 'واحد');
        }
        if (filterCol('degree/rank') == true) {                                                       
            array_push($headings, 'درجه/رتبه');
        }
        if (filterCol('score') == true) {                                                       
            array_push($headings, 'امتیاز');
        }
        if (filterCol('established_year') == true) {                                                       
            array_push($headings, 'سال تاسیس');
        }
        if (filterCol('approved_number_and_titles_of_the_faculty') == true) {                                                       
            array_push($headings, 'تعداد و عناوین دانشکده مصوب');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
