<?php

namespace App\Exports\Gostaresh\SocialHealth;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $socialHealths;
    private $count = 0;

    public function __construct($socialHealths)
    {
        $this->socialHealths = $socialHealths;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->socialHealths;
    }
   
    public function map($socialHealths): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $socialHealths?->province?->name . ' - ' . $socialHealths?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $socialHealths?->unit);
        }
        if (filterCol('component_title') == true) {
            array_push($mapping, $socialHealths?->component_title);
        }
        if (filterCol('gender') == true) {
            array_push($mapping, $socialHealths?->gender);
        }
        if (filterCol('associate_degree') == true) {
            array_push($mapping, $socialHealths?->associate_degree);
        }
        if (filterCol('bachelor_degree') == true) {
            array_push($mapping, $socialHealths?->bachelor_degree);
        }
        if (filterCol('masters') == true) {
            array_push($mapping, $socialHealths?->masters);
        }
        if (filterCol('professional_doctor') == true) {
            array_push($mapping, $socialHealths?->professional_doctor);
        }
        if (filterCol('phd') == true) {
            array_push($mapping, $socialHealths?->phd);
        }
        
        array_push($mapping, $socialHealths?->year);
        array_push($mapping, $socialHealths?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('component_title') == true) {
            array_push($headings, 'مولفه');
        }
        if (filterCol('gender') == true) {
            array_push($headings, 'جنسیت');
        }
        if (filterCol('associate_degree') == true) {
            array_push($headings, 'کاردانی');
        }
        if (filterCol('bachelor_degree') == true) {
            array_push($headings, 'کارشناسی');
        }
        if (filterCol('masters') == true) {
            array_push($headings, 'کارشناسی ارشد');
        }
        if (filterCol('professional_doctor') == true) {
            array_push($headings, 'دکتری حرفه ای');
        }
        if (filterCol('phd') == true) {
            array_push($headings, 'دکتری تخصصی');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
}
