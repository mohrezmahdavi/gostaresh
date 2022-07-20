<?php

namespace App\Exports\Gostaresh\TeachersStatusAnalysis;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $teachersStatusAnalyses;
    private $count = 0;

    public function __construct($teachersStatusAnalyses)
    {
        $this->teachersStatusAnalyses = $teachersStatusAnalyses;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->teachersStatusAnalyses;
    }
   
    public function map($teachersStatusAnalyses): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $teachersStatusAnalyses?->province?->name . ' - ' . $teachersStatusAnalyses?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $teachersStatusAnalyses?->unit);
        }
        if (filterCol('number_of_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_faculty_members);
        }
        if (filterCol('scientific_programs_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->scientific_programs_faculty_members);
        }
        if (filterCol('upgraded_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->upgraded_faculty_members);
        }
        if (filterCol('number_of_tuition_teachers') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_tuition_teachers);
        }
        if (filterCol('number_of_officer_faculty_members_in_other_unit') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_officer_faculty_members_in_other_unit);
        }
        if (filterCol('number_of_officer_faculty_members_in_central_organization') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_officer_faculty_members_in_central_organization);
        }
        if (filterCol('number_of_participant_faculty_members_in_cooperation_plan') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_participant_faculty_members_in_cooperation_plan);
        }
        if (filterCol('number_of_transfer_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_transfer_faculty_members);
        }
        if (filterCol('number_of_instructor_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_instructor_faculty_members);
        }
        if (filterCol('number_of_assistant_professor_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_assistant_professor_faculty_members);
        }
        if (filterCol('number_of_associate_professor_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_associate_professor_faculty_members);
        }
        if (filterCol('number_of_full_professor_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_full_professor_faculty_members);
        }
        if (filterCol('number_of_faculty_members_smaller_50_years_old') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_faculty_members_smaller_50_years_old);
        }
        if (filterCol('number_of_technology_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_technology_faculty_members);
        }
        if (filterCol('number_of_faculty_members_type_a') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_faculty_members_type_a);
        }
        if (filterCol('number_of_faculty_members_type_b') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_faculty_members_type_b);
        }
        if (filterCol('number_of_top_scientific_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->number_of_top_scientific_faculty_members);
        }
        if (filterCol('average_level_of_research_productivity_of_faculty_members') == true) {
            array_push($mapping, $teachersStatusAnalyses?->average_level_of_research_productivity_of_faculty_members);
        }

        array_push($mapping, $teachersStatusAnalyses?->year);
        array_push($mapping, $teachersStatusAnalyses?->month);

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('number_of_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی');
        }
        if (filterCol('scientific_programs_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی');
        }
        if (filterCol('upgraded_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی ارتقا یافته');
        }
        if (filterCol('number_of_tuition_teachers') == true) {
            array_push($headings, 'تعداد مدرسین حق التدریس و اساتید مدعو');
        }
        if (filterCol('number_of_officer_faculty_members_in_other_unit') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی مامور در سایر واحدها');
        }
        if (filterCol('number_of_officer_faculty_members_in_central_organization') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی مامور در سازمان مرکزی');
        }
        if (filterCol('number_of_participant_faculty_members_in_cooperation_plan') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی شرکت کننده در طرح تعاون');
        }
        if (filterCol('number_of_transfer_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی انتقالی');
        }
        if (filterCol('number_of_instructor_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی با درجه مربی');
        }
        if (filterCol('number_of_assistant_professor_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی با درجه استادیار');
        }
        if (filterCol('number_of_associate_professor_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی با درجه دانشیار');
        }
        if (filterCol('number_of_full_professor_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی با درجه استاد تمام');
        }
        if (filterCol('number_of_faculty_members_smaller_50_years_old') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی دارای سن کمتر از 50 سال');
        }
        if (filterCol('number_of_technology_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی فناور');
        }
        if (filterCol('number_of_faculty_members_type_a') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی نوع الف');
        }
        if (filterCol('number_of_faculty_members_type_b') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی نوع ب');
        }
        if (filterCol('number_of_top_scientific_faculty_members') == true) {
            array_push($headings, 'تعداد اعضای هیات علمی سرآمد علمی');
        }
        if (filterCol('average_level_of_research_productivity_of_faculty_members') == true) {
            array_push($headings, 'متوسط سطح بهره وری پژوهشی اعضای هیات علمی');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
    
}