<?php

namespace App\Exports\Gostaresh\RevenueStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $revenueStatusAnalyses;
    private $count = 0;

    public function __construct($revenueStatusAnalyses)
    {
        $this->revenueStatusAnalyses = $revenueStatusAnalyses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->revenueStatusAnalyses;
    }
   
    public function map($revenueStatusAnalyses): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $revenueStatusAnalyses?->province?->name . ' - ' . $revenueStatusAnalyses?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $revenueStatusAnalyses?->unit);
        }
        if (filterCol('total_revenue') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->total_revenue ));
        }
        if (filterCol('income_from_student_tuition') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->income_from_student_tuition ));
        }
        if (filterCol('income_from_commercialized_technologies') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->income_from_commercialized_technologies ));
        }
        if (filterCol('income_from_research_activities') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->income_from_research_activities ));
        }
        if (filterCol('income_from_skills_training') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->income_from_skills_training ));
        }
        if (filterCol('operating_income_growth_rate') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->operating_income_growth_rate ));
        }
        if (filterCol('total_non_tuition_income') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->total_non_tuition_income ));
        }
        if (filterCol('total_international_income') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->total_international_income ));
        }
        if (filterCol('shareholder_income') == true) {
            array_push($mapping, number_format((int) $revenueStatusAnalyses?->shareholder_income ));
        }

        array_push($mapping, $revenueStatusAnalyses?->year);
        array_push($mapping, $revenueStatusAnalyses?->month);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('total_revenue') == true) {
            array_push($headings, 'کل درآمد ها');
        }
        if (filterCol('income_from_student_tuition') == true) {
            array_push($headings, 'درآمد حاصل از شهریه دانشجویان');
        }
        if (filterCol('income_from_commercialized_technologies') == true) {
            array_push($headings, 'درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده');
        }
        if (filterCol('income_from_research_activities') == true) {
            array_push($headings, 'درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد');
        }
        if (filterCol('income_from_skills_training') == true) {
            array_push($headings, 'درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد');
        }
        if (filterCol('operating_income_growth_rate') == true) {
            array_push($headings, 'نرخ رشد درآمدهای عملیاتی واحد');
        }
        if (filterCol('total_non_tuition_income') == true) {
            array_push($headings, 'مجموع درآمدهای غیر شهریه ای واحد');
        }
        if (filterCol('total_international_income') == true) {
            array_push($headings, 'مجموع درآمد های ناشی از فعالیت های بین المللی');
        }
        if (filterCol('shareholder_income') == true) {
            array_push($headings, 'درآمد ناشی از سهامداری');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
    
}
