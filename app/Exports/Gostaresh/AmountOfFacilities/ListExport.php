<?php

namespace App\Exports\Gostaresh\AmountOfFacilities;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $amountOfFacilitiesForResearchAchievements;
    private $count = 0;

    public function __construct($amountOfFacilitiesForResearchAchievements)
    {
        $this->amountOfFacilitiesForResearchAchievements = $amountOfFacilitiesForResearchAchievements;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->amountOfFacilitiesForResearchAchievements;
    }
   
    public function map($amountOfFacilitiesForResearchAchievements): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $amountOfFacilitiesForResearchAchievements?->province?->name . ' - ' . $amountOfFacilitiesForResearchAchievements?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $amountOfFacilitiesForResearchAchievements?->unit);
        }
        if (filterCol('amount') == true) {
            array_push($mapping, $amountOfFacilitiesForResearchAchievements?->amount);
        }

        array_push($mapping, $amountOfFacilitiesForResearchAchievements?->year);
        array_push($mapping, $amountOfFacilitiesForResearchAchievements?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('amount') == true) {
            array_push($headings, "میزان تسھیلات و حمایت ھای مالی");
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
}
