<?php

namespace App\Exports\Gostaresh\NumberOfResearchProject;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{

    private $numberOfResearchProjects;
    private $count = 0;

    public function __construct($numberOfResearchProjects)
    {
        $this->numberOfResearchProjects = $numberOfResearchProjects;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->numberOfResearchProjects;
    }

    public function map($numberOfResearchProject): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];

        array_push($mapping, $numberOfResearchProject?->province?->name . ' - ' . $numberOfResearchProject?->county?->name);

        if (filterCol('number_of_research') == true) {
            array_push($mapping, $numberOfResearchProject?->number_of_research);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $numberOfResearchProject?->year);
        }
       
        return $mapping;
    }



    public function headings(): array
    {
        $headings = ["#"];

        array_push($headings, 'شهرستان');

        if (filterCol('number_of_research') == true) {
            array_push($headings, 'مقدار');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        
        return $headings;
    }
}
