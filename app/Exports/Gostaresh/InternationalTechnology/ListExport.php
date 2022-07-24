<?php

namespace App\Exports\Gostaresh\InternationalTechnology;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $internationalTechnologies;
    private $count = 0;

    public function __construct($internationalTechnologies)
    {
        $this->internationalTechnologies = $internationalTechnologies;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->internationalTechnologies;
    }
   
    public function map($internationalTechnologies): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $internationalTechnologies?->province?->name . ' - ' . $internationalTechnologies?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $internationalTechnologies?->unit);
        }
        if (filterCol('number_of_participation') == true) {
            array_push($mapping, $internationalTechnologies?->number_of_participation);
        }
        if (filterCol('number_of_technical_services') == true) {
            array_push($mapping, $internationalTechnologies?->number_of_technical_services);
        }
        if (filterCol('earnings') == true) {
            array_push($mapping, $internationalTechnologies?->earnings);
        }
        if (filterCol('number_of_international_inventions') == true) {
            array_push($mapping, $internationalTechnologies?->number_of_international_inventions);
        }
        if (filterCol('number_of_international_knowledge_based_companies') == true) {
            array_push($mapping, $internationalTechnologies?->number_of_international_knowledge_based_companies);
        }

        array_push($mapping, $internationalTechnologies?->year);
        array_push($mapping, $internationalTechnologies?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('number_of_participation') == true) {
            array_push($headings, 'تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور');
        }
        if (filterCol('number_of_technical_services') == true) {
            array_push($headings, 'تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی');
        }
        if (filterCol('earnings') == true) {
            array_push($headings, 'میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی');
        }
        if (filterCol('number_of_international_inventions') == true) {
            array_push($headings, 'تعداد ثبت و یا فایلینگ اختراعات بین المللی');
        }
        if (filterCol('number_of_international_knowledge_based_companies') == true) {
            array_push($headings, 'تعداد شرکت های دانش بنیان با فعالیت بین المللی');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }

}
