<?php

namespace App\Exports\Gostaresh\TechnologicalProduct;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $technologicalProducts;
    private $count = 0;

    public function __construct($technologicalProducts)
    {
        $this->technologicalProducts = $technologicalProducts;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->technologicalProducts;
    }
   
    public function map($technologicalProducts): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $technologicalProducts?->province?->name . ' - ' . $technologicalProducts?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $technologicalProducts?->unit);
        }
        if (filterCol('number_of_active_technology_cores') == true) {
            array_push($mapping, $technologicalProducts?->number_of_active_technology_cores);
        }
        if (filterCol('number_of_active_technology_units') == true) {
            array_push($mapping, $technologicalProducts?->number_of_active_technology_units);
        }
        if (filterCol('number_of_active_knowledge_based_companies') == true) {
            array_push($mapping, $technologicalProducts?->number_of_active_knowledge_based_companies);
        }
        if (filterCol('number_of_creative_companies') == true) {
            array_push($mapping, $technologicalProducts?->number_of_creative_companies);
        }
        if (filterCol('number_of_commercialized_ideas') == true) {
            array_push($mapping, $technologicalProducts?->number_of_commercialized_ideas);
        }
        if (filterCol('number_of_knowledge_based_products') == true) {
            array_push($mapping, $technologicalProducts?->number_of_knowledge_based_products);
        }
        if (filterCol('number_of_products_without_license') == true) {
            array_push($mapping, $technologicalProducts?->number_of_products_without_license);
        }
        if (filterCol('number_of_licensed_products') == true) {
            array_push($mapping, $technologicalProducts?->number_of_licensed_products);
        }
        if (filterCol('number_of_active_technology_professors') == true) {
            array_push($mapping, $technologicalProducts?->number_of_active_technology_professors);
        }
        if (filterCol('number_of_active_technology_students') == true) {
            array_push($mapping, $technologicalProducts?->number_of_active_technology_students);
        }

        array_push($mapping, $technologicalProducts?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('number_of_active_technology_cores') == true) {
            array_push($headings, 'تعداد هسته فناور فعال');
        }
        if (filterCol('number_of_active_technology_units') == true) {
            array_push($headings, 'تعداد واحدهای فناور فعال');
        }
        if (filterCol('number_of_active_knowledge_based_companies') == true) {
            array_push($headings, 'تعداد شرکت دانش بنیان فعال');
        }
        if (filterCol('number_of_creative_companies') == true) {
            array_push($headings, 'تعداد شرکت های خلاق');
        }
        if (filterCol('number_of_commercialized_ideas') == true) {
            array_push($headings, 'تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده');
        }
        if (filterCol('number_of_knowledge_based_products') == true) {
            array_push($headings, 'تعداد محصولات دانش بنیان');
        }
        if (filterCol('number_of_products_without_license') == true) {
            array_push($headings, 'تعداد محصولات بدون مجوز');
        }
        if (filterCol('number_of_licensed_products') == true) {
            array_push($headings, 'تعداد محصولات با مجوز');
        }
        if (filterCol('number_of_active_technology_professors') == true) {
            array_push($headings, 'تعداد استاد فناور فعال');
        }
        if (filterCol('number_of_active_technology_students') == true) {
            array_push($headings, 'تعداد دانشجوی فناور فعال');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }

}
