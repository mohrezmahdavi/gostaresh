<?php

namespace App\Exports\Gostaresh\InnovationInfrastructures;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $innovationInfrastructures;
    private $count = 0;

    public function __construct($innovationInfrastructures)
    {
        $this->innovationInfrastructures = $innovationInfrastructures;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->innovationInfrastructures;
    }
   
    public function map($innovationInfrastructures): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $innovationInfrastructures?->province?->name . ' - ' . $innovationInfrastructures?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $innovationInfrastructures?->unit);
        }
        if (filterCol('number_of_active_innovation_houses') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_active_innovation_houses);
        }
        if (filterCol('number_of_active_accelerators') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_active_accelerators);
        }
        if (filterCol('number_of_active_growth_centers') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_active_growth_centers);
        }
        if (filterCol('number_of_active_technology_cores') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_active_technology_cores);
        }
        if (filterCol('number_of_active_skill_high_schools') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_active_skill_high_schools);
        }
        if (filterCol('number_of_skill_training_centers') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_skill_training_centers);
        }
        if (filterCol('number_of_research_centers') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_research_centers);
        }
        if (filterCol('number_of_development_offices') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_development_offices);
        }
        if (filterCol('number_of_industry_trade_offices') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_industry_trade_offices);
        }
        if (filterCol('number_of_entrepreneurship_centers') == true) {
            array_push($mapping, $innovationInfrastructures?->number_of_entrepreneurship_centers);
        }

        array_push($mapping, $innovationInfrastructures?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('number_of_active_innovation_houses') == true) {
            array_push($headings, 'تعداد سرای نوآوری فعال');
        }
        if (filterCol('number_of_active_accelerators') == true) {
            array_push($headings, 'تعداد شتاب دهنده فعال');
        }
        if (filterCol('number_of_active_growth_centers') == true) {
            array_push($headings, 'تعداد مراکز رشد فعال');
        }
        if (filterCol('number_of_active_technology_cores') == true) {
            array_push($headings, 'تعداد هسته فناور فعال');
        }
        if (filterCol('number_of_active_skill_high_schools') == true) {
            array_push($headings, 'تعداد مدارس عالی مهارتی فعال');
        }
        if (filterCol('number_of_skill_training_centers') == true) {
            array_push($headings, 'تعداد مراکز توانمندسازی و آموزش مهارتی');
        }
        if (filterCol('number_of_research_centers') == true) {
            array_push($headings, 'تعداد مراکز تحقیقاتی');
        }
        if (filterCol('number_of_development_offices') == true) {
            array_push($headings, 'تعداد دفاتر توسعه و انتقال فناوری');
        }
        if (filterCol('number_of_industry_trade_offices') == true) {
            array_push($headings, 'تعداددفاتر کلینیک صنعت، معدن و تجارت');
        }
        if (filterCol('number_of_entrepreneurship_centers') == true) {
            array_push($headings, 'تعداد مراکز کارآفرینی');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }

}
