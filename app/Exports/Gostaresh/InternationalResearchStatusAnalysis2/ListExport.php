<?php

namespace App\Exports\Gostaresh\InternationalResearchStatusAnalysis2;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $internationalResearchStatusAnalyses;
    private $count = 0;

    public function __construct($internationalResearchStatusAnalyses)
    {
        $this->internationalResearchStatusAnalyses = $internationalResearchStatusAnalyses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->internationalResearchStatusAnalyses;
    }
   
    public function map($internationalResearchStatusAnalyses): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $internationalResearchStatusAnalyses?->province?->name . ' - ' . $internationalResearchStatusAnalyses?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->unit);
        }
     
        if (filterCol('average_H_index_of_faculty_members') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->average_H_index_of_faculty_members);
        }
        if (filterCol('number_of_articles_science_and_nature') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_articles_science_and_nature);
        }
        if (filterCol('print_ISI_articles') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->print_ISI_articles);
        }
        if (filterCol('percentage_of_quality_articles') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->percentage_of_quality_articles);
        }
        if (filterCol('number_of_faculty_members_of_world_scientists') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_faculty_members_of_world_scientists);
        }
        if (filterCol('number_of_faculty_members_of_international_journals') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_faculty_members_of_international_journals);
        }
        if (filterCol('number_of_international_conferences_held') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_conferences_held);
        }
        if (filterCol('number_of_international_scientific_books') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_scientific_books);
        }
        if (filterCol('number_of_international_agreements_implemented') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_agreements_implemented);
        }
        if (filterCol('amount_of_international_research_credits') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->amount_of_international_research_credits);
        }
        if (filterCol('number_of_international_publications') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_publications);
        }

        array_push($mapping, $internationalResearchStatusAnalyses?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('average_H_index_of_faculty_members') == true) {
            array_push($headings, 'متوسط H-index اعضای هیات علمی');
        }
        if (filterCol('number_of_articles_science_and_nature') == true) {
            array_push($headings, 'تعداد مقالات در دو مجله Science و Nature');
        }
        if (filterCol('print_ISI_articles') == true) {
            array_push($headings, 'سرانه چاپ مقالات ISI');
        }
        if (filterCol('percentage_of_quality_articles') == true) {
            array_push($headings, 'درصد مقالات کیفی در ۲۵ درصد بالای فهرست JCR (Q1)');
        }
        if (filterCol('number_of_faculty_members_of_world_scientists') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی با بیش از ۱۰۰۰ استناد یا در ردیف دانشمندان برتر جهان بر اساس نظام‌های رتبه بندی مصوب');
        }
        if (filterCol('number_of_faculty_members_of_international_journals') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی عضو هیات تحریریه مجلات معتبر بین المللی');
        }
        if (filterCol('number_of_international_conferences_held') == true) {
            array_push($headings, 'تعداد همایش های بین المللی برگزار شده مصوب هیات امنا در ۵ سال اخیر');
        }
        if (filterCol('number_of_international_scientific_books') == true) {
            array_push($headings, 'تعداد کتب علمی بین المللی و چاپ فصلی از کتاب های علمی بین المللی با Affiliation دانشگاه آزاد اسلامی');
        }
        if (filterCol('number_of_international_agreements_implemented') == true) {
            array_push($headings, 'تعداد تفاهم نامه های بین المللی اجرایی شده');
        }
        if (filterCol('amount_of_international_research_credits') == true) {
            array_push($headings, 'میزان اعتبارات پژوهشی (گرنت) بین المللی اخذ شده');
        }
        if (filterCol('number_of_international_publications') == true) {
            array_push($headings, 'تعداد نشریه های دارای نمایه های استنادی بین المللی');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }

}