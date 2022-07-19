<?php

namespace App\Exports\Gostaresh\StatusAnalysisOfTheNumberOfCurricula;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $statusAnalysisOfTheNumberOfCurriculas;
    private $count = 0;

    public function __construct($statusAnalysisOfTheNumberOfCurriculas)
    {
        $this->statusAnalysisOfTheNumberOfCurriculas = $statusAnalysisOfTheNumberOfCurriculas;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->statusAnalysisOfTheNumberOfCurriculas;
    }


    public function map($statusAnalysisOfTheNumberOfCurriculas): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->province?->name . ' - ' . $statusAnalysisOfTheNumberOfCurriculas?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->unit);
        }
        if (filterCol('total_number_of_curricula') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->total_number_of_curricula);
        }
        if (filterCol('number_of_modified_curricula') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->number_of_modified_curricula);
        }
        if (filterCol('new_interdisciplinary_curricula_implemented') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->new_interdisciplinary_curricula_implemented);
        }
        if (filterCol('complete_new_interdisciplinary_curricula') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->complete_new_interdisciplinary_curricula);
        }
        if (filterCol('number_of_common_curricula_with_the_world') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->number_of_common_curricula_with_the_world);
        }
        if (filterCol('number_of_curricula_developed') == true) {
            array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->number_of_curricula_developed);
        }
        array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->year);
        array_push($mapping, $statusAnalysisOfTheNumberOfCurriculas?->month);

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('total_number_of_curricula') == true) {
            array_push($headings, 'تعداد کل برنامه های درسی (رشته گرایش ها)');
        }
        if (filterCol('number_of_modified_curricula') == true) {
            array_push($headings, 'تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی');
        }
        if (filterCol('new_interdisciplinary_curricula_implemented') == true) {
            array_push($headings, 'برنامه های درسی جدید میان رشته ای مورد اجرا');
        }
        if (filterCol('complete_new_interdisciplinary_curricula') == true) {
            array_push($headings, 'کل برنامه های درسی جدید میان رشته ای مورد اجرا');
        }
        if (filterCol('number_of_common_curricula_with_the_world') == true) {
            array_push($headings, 'تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان');
        }
        if (filterCol('number_of_curricula_developed') == true) {
            array_push($headings, 'تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
    
}
