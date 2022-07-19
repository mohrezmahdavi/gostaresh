<?php

namespace App\Exports\Gostaresh\GraduateStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $graduateStatusAnalysis;
    private $count = 0;

    public function __construct($graduateStatusAnalysis)
    {
        $this->graduateStatusAnalysis = $graduateStatusAnalysis;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->graduateStatusAnalysis;
    }
   
    public function map($graduateStatusAnalysis): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $graduateStatusAnalysis?->province?->name . ' - ' . $graduateStatusAnalysis?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $graduateStatusAnalysis?->unit);
        }
        if (filterCol('total_graduates') == true) {
            array_push($mapping, $graduateStatusAnalysis?->total_graduates);
        }
        if (filterCol('employed_graduates') == true) {
            array_push($mapping, $graduateStatusAnalysis?->employed_graduates);
        }
        if (filterCol('graduate_growth_rate') == true) {
            array_push($mapping, $graduateStatusAnalysis?->graduate_growth_rate);
        }
        if (filterCol('related_employed_graduates') == true) {
            array_push($mapping, $graduateStatusAnalysis?->related_employed_graduates);
        }
        if (filterCol('skill_certification_graduates') == true) {
            array_push($mapping, $graduateStatusAnalysis?->skill_certification_graduates);
        }
        if (filterCol('employed_graduates_6_months_after_graduation') == true) {
            array_push($mapping, $graduateStatusAnalysis?->employed_graduates_6_months_after_graduation);
        }
        if (filterCol('average_monthly_income_employed_graduates') == true) {
            array_push($mapping, $graduateStatusAnalysis?->average_monthly_income_employed_graduates);
        }
        array_push($mapping, $graduateStatusAnalysis?->year);
        array_push($mapping, $graduateStatusAnalysis?->month);

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('total_graduates') == true) {
            array_push($headings, 'تعداد کل فارغ التحصیلان');
        }
        if (filterCol('employed_graduates') == true) {
            array_push($headings, 'تعداد فارغ التحصیلان شاغل');
        }
        if (filterCol('graduate_growth_rate') == true) {
            array_push($headings, 'نرخ رشد فارغ التحصیلان');
        }
        if (filterCol('related_employed_graduates') == true) {
            array_push($headings, 'تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی');
        }
        if (filterCol('skill_certification_graduates') == true) {
            array_push($headings, 'تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای');
        }
        if (filterCol('employed_graduates_6_months_after_graduation') == true) {
            array_push($headings, 'تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل');
        }
        if (filterCol('average_monthly_income_employed_graduates') == true) {
            array_push($headings, 'متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
}
