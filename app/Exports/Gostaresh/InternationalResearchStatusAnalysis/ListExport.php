<?php

namespace App\Exports\Gostaresh\InternationalResearchStatusAnalysis;


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
        if (filterCol('number_of_laboratories') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_laboratories);
        }
        if (filterCol('number_of_research_projects') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_research_projects);
        }
        if (filterCol('number_of_shared_articles') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_shared_articles);
        }
        if (filterCol('number_of_international_research_projects') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_research_projects);
        }
        if (filterCol('number_of_faculty_members_using_study_abroad') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_faculty_members_using_study_abroad);
        }
        if (filterCol('number_of_graduate_students_with_opportunities_abroad') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_graduate_students_with_opportunities_abroad);
        }
        if (filterCol('number_of_research_opportunities_presented') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_research_opportunities_presented);
        }
        if (filterCol('number_of_foreign_workshops_held') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_foreign_workshops_held);
        }
        if (filterCol('number_of_international_lectures_held') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_lectures_held);
        }
        if (filterCol('number_of_international_awards') == true) {
            array_push($mapping, $internationalResearchStatusAnalyses?->number_of_international_awards);
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
        array_push($mapping, $internationalResearchStatusAnalyses?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('number_of_laboratories') == true) {
            array_push($headings, 'تعداد آزمایشگاه ها و کارگاه های دارای استاندارد بین المللی مصوب');
        }
        if (filterCol('number_of_research_projects') == true) {
            array_push($headings, 'تعداد طرح های تحقیقاتی مشترک با محققان خارجی');
        }
        if (filterCol('number_of_shared_articles') == true) {
            array_push($headings, 'تعداد مقالات مشترک با محققان خارجی و متخصصان ایرانی مقیم خارج از کشور');
        }
        if (filterCol('number_of_international_research_projects') == true) {
            array_push($headings, 'تعداد طرح های تحقیقاتی بین المللی با ارزش بالای ۱۰۰ هزار دلار');
        }
        if (filterCol('number_of_faculty_members_using_study_abroad') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی استفاده کننده از فرصت های مطالعاتی خارج از کشور در هر سال تحصیلی');
        }
        if (filterCol('number_of_graduate_students_with_opportunities_abroad') == true) {
            array_push($headings, 'تعداد دانشجویان تحصیلات تکمیلی دارای فرصت های مطالعاتی و تحقیقاتی خارج از کشور');
        }
        if (filterCol('number_of_research_opportunities_presented') == true) {
            array_push($headings, 'تعداد فرصت های تحقیقاتی و پسادکتری ارایه شده به محققان و دانشجویان کشورهای خارجی ومحققان ایرانی خارج از کشور');
        }
        if (filterCol('number_of_foreign_workshops_held') == true) {
            array_push($headings, 'تعداد کارگاهها، دوره های آموزشی و تدریس بین المللی برگزار شده توسط اساتید خارجی ومتخصصان ایرانی غیر مقیم');
        }
        if (filterCol('number_of_international_lectures_held') == true) {
            array_push($headings, 'تعدادسخنرانی وسمینارهای علمی بین المللی برگزارشده توسط اساتیدخارجی و متخصصان ایرانی غیر مقیم');
        }
        if (filterCol('number_of_international_awards') == true) {
            array_push($headings, 'تعداد جوایز بین المللی کسب شده در ۵ سال اخیر');
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
        array_push($headings, 'ماه');
        
        return $headings;
    }

}