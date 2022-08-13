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

        array_push($headings, 'سال');
        
        return $headings;
    }

}