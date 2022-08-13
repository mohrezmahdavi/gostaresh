<?php

namespace App\Exports\Gostaresh\ResearchOutputStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $researchOutputStatusAnalyses;
    private $count = 0;

    public function __construct($researchOutputStatusAnalyses)
    {
        $this->researchOutputStatusAnalyses = $researchOutputStatusAnalyses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->researchOutputStatusAnalyses;
    }
   
    public function map($researchOutputStatusAnalyses): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $researchOutputStatusAnalyses?->province?->name . ' - ' . $researchOutputStatusAnalyses?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->unit);
        }
        if (filterCol('number_of_valid_scientific_articles') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_valid_scientific_articles);
        }
        if (filterCol('number_of_valid_books') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_valid_books);
        }
        if (filterCol('number_of_authored_books') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_authored_books);
        }
        if (filterCol('number_of_internal_inventions') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_internal_inventions);
        }
        if (filterCol('number_of_international_inventions') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_international_inventions);
        }
        if (filterCol('number_of_theses') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_theses);
        }
        if (filterCol('number_of_research_dissertations') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_research_dissertations);
        }
        if (filterCol('number_of_compiled_dissertations') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_compiled_dissertations);
        }
        if (filterCol('number_of_invented_dissertations') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_invented_dissertations);
        }
        if (filterCol('number_of_product_dissertations') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_product_dissertations);
        }
        if (filterCol('number_of_completed_research_projects') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_completed_research_projects);
        }
        if (filterCol('number_of_theorizing_chairs') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_theorizing_chairs);
        }
        if (filterCol('number_of_memoranda_of_understanding') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_memoranda_of_understanding);
        }
        if (filterCol('amount_of_national_contracts_concluded') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->amount_of_national_contracts_concluded);
        }
        if (filterCol('amount_of_local_contracts_concluded') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->amount_of_local_contracts_concluded);
        }
        if (filterCol('number_of_scientific_journals') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_scientific_journals);
        }
        if (filterCol('number_of_R&D_research') == true) {
            array_push($mapping, $researchOutputStatusAnalyses['number_of_R&D_research']);
        }
        if (filterCol('number_of_innovative_ideas') == true) {
            array_push($mapping, $researchOutputStatusAnalyses?->number_of_innovative_ideas);
        }

        array_push($mapping, $researchOutputStatusAnalyses?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('number_of_valid_scientific_articles') == true) {
            array_push($headings, 'تعداد مقالات معتبر علمی');
        }
        if (filterCol('number_of_valid_books') == true) {
            array_push($headings, 'تعداد کتب معتبر');
        }
        if (filterCol('number_of_authored_books') == true) {
            array_push($headings, 'تعداد کتب تالیفی');
        }
        if (filterCol('number_of_internal_inventions') == true) {
            array_push($headings, 'تعداد اختراعات ثبت شده داخلی');
        }
        if (filterCol('number_of_international_inventions') == true) {
            array_push($headings, 'تعداد اختراعات ثبت شده بین المللی');
        }
        if (filterCol('number_of_theses') == true) {
            array_push($headings, 'تعداد پایان نامه ها');
        }
        if (filterCol('number_of_research_dissertations') == true) {
            array_push($headings, 'تعداد پایان نامه های منجر به مقاله علمی-پژوهشی');
        }
        if (filterCol('number_of_compiled_dissertations') == true) {
            array_push($headings, 'تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه');
        }
        if (filterCol('number_of_invented_dissertations') == true) {
            array_push($headings, 'تعداد پایان نامه های منجر به ثبت اختراع');
        }
        if (filterCol('number_of_product_dissertations') == true) {
            array_push($headings, 'تعداد پایان نامه های منجر به محصول');
        }
        if (filterCol('number_of_completed_research_projects') == true) {
            array_push($headings, 'تعداد طرح های تحقیقاتی خاتمه یافته');
        }
        if (filterCol('number_of_theorizing_chairs') == true) {
            array_push($headings, 'تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی');
        }
        if (filterCol('number_of_memoranda_of_understanding') == true) {
            array_push($headings, 'تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی');
        }
        if (filterCol('amount_of_national_contracts_concluded') == true) {
            array_push($headings, 'مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی');
        }
        if (filterCol('amount_of_local_contracts_concluded') == true) {
            array_push($headings, 'مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی');
        }
        if (filterCol('number_of_scientific_journals') == true) {
            array_push($headings, 'تعداد مجلات علمی');
        }
        if (filterCol('number_of_R&D_research') == true) {
            array_push($headings, 'تعداد پژوهش های معطوف به R&D');
        }
        if (filterCol('number_of_innovative_ideas') == true) {
            array_push($headings, 'تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}