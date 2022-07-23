<?php

namespace App\Exports\Gostaresh\AcademicMajorEducational;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $count = 0;

    private $academicMajorEducationals;

    public function __construct($academicMajorEducationals)
    {
        $this->academicMajorEducationals = $academicMajorEducationals;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->academicMajorEducationals;
    }

    public function map($academicMajorEducational): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $academicMajorEducational?->province?->name . ' - ' . $academicMajorEducational->county?->name);

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $academicMajorEducational?->department_of_education_title);
        }
        if (filterCol('azad_eslami_count') == true) {
            array_push($mapping, $academicMajorEducational?->azad_eslami_count);
        }

        if (filterCol('dolati_count') == true) {
            array_push($mapping, $academicMajorEducational?->dolati_count);
        }

        if (filterCol('payam_noor_count') == true) {
            array_push($mapping, $academicMajorEducational?->payam_noor_count);
        }

        if (filterCol('gheir_entefai_count') == true) {
            array_push($mapping, $academicMajorEducational?->gheir_entefai_count);
        }

        if (filterCol('elmi_karbordi_count') == true) {
            array_push($mapping, $academicMajorEducational?->elmi_karbordi_count);
        }
        if (filterCol('year') == true) {
            array_push($mapping, $academicMajorEducational?->year);
        }

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('department_of_education_title') == true) {
            array_push($headings, 'گروه تحصیلی');
        }
        if (filterCol('azad_eslami_count') == true) {
            array_push($headings, 'دانشگاه آزاد اسلامی واحد');
        }
        if (filterCol('dolati_count') == true) {
            array_push($headings, 'دولتی');
        }
        if (filterCol('payam_noor_count') == true) {
            array_push($headings, 'پیام نور');
        }
        if (filterCol('gheir_entefai_count') == true) {
            array_push($headings, 'موسسات غیر انتفاعی');
        }
        if (filterCol('elmi_karbordi_count') == true) {
            array_push($headings, 'علمی - کاربردی');
        }
        if (filterCol('year') == true) {
            array_push($headings, 'سال');
        }
        return $headings;
    }

}
