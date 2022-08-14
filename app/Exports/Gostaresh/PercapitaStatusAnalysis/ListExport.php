<?php

namespace App\Exports\Gostaresh\PercapitaStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $percapitaStatusAnalyses;
    private $count = 0;

    public function __construct($percapitaStatusAnalyses)
    {
        $this->percapitaStatusAnalyses = $percapitaStatusAnalyses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->percapitaStatusAnalyses;
    }
   
    public function map($percapitaStatusAnalyses): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $percapitaStatusAnalyses?->province?->name . ' - ' . $percapitaStatusAnalyses?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->unit);
        }
        if (filterCol('percapita_office_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_office_space);
        }
        if (filterCol('percapita_educational_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_educational_space);
        }
        if (filterCol('percapita_innovation_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_innovation_space);
        }
        if (filterCol('percapita_cultural_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_cultural_space);
        }
        if (filterCol('percapita_civil_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_civil_space);
        }
        if (filterCol('building_under_construction') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->building_under_construction);
        }
        if (filterCol('percapita_residential') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_residential);
        }
        if (filterCol('percapita_operating_buildings') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_operating_buildings);
        }
        if (filterCol('percapita_sports_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_sports_space);
        }
        if (filterCol('percapita_aristocratic_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_aristocratic_space);
        }
        if (filterCol('percapita_arena_space') == true) {
            array_push($mapping, $percapitaStatusAnalyses?->percapita_arena_space);
        }

        array_push($mapping, $percapitaStatusAnalyses?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('percapita_office_space') == true) {
            array_push($headings, 'سرانه فضای اداری');
        }
        if (filterCol('percapita_educational_space') == true) {
            array_push($headings, 'سرانه فضای آموزشی');
        }
        if (filterCol('percapita_innovation_space') == true) {
            array_push($headings, 'سرانه فضای فناوری و نوآوری');
        }
        if (filterCol('percapita_cultural_space') == true) {
            array_push($headings, 'سرانه فضای فرهنگی');
        }
        if (filterCol('percapita_civil_space') == true) {
            array_push($headings, 'سرانه فضای عمرانی');
        }
        if (filterCol('building_under_construction') == true) {
            array_push($headings, 'ساختمان در دست احداث');
        }
        if (filterCol('percapita_residential') == true) {
            array_push($headings, 'سرانه اقامتی');
        }
        if (filterCol('percapita_operating_buildings') == true) {
            array_push($headings, 'سرانه ساختمان های بهره بردار');
        }
        if (filterCol('percapita_sports_space') == true) {
            array_push($headings, 'سرانه فضای ورزشی');
        }
        if (filterCol('percapita_aristocratic_space') == true) {
            array_push($headings, 'سرانه فضای اعیانی');
        }
        if (filterCol('percapita_arena_space') == true) {
            array_push($headings, 'سرانه فضای عرصه');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
