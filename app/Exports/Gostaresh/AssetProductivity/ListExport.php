<?php

namespace App\Exports\Gostaresh\AssetProductivity;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $assetProductivity;
    private $count = 0;

    public function __construct($assetProductivity)
    {
        $this->assetProductivity = $assetProductivity;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->assetProductivity;
    }
   
    public function map($assetProductivity): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $assetProductivity?->province?->name . ' - ' . $assetProductivity?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $assetProductivity?->unit);
        }
        if (filterCol('office_space_utilization_rate') == true) {
            array_push($mapping, $assetProductivity?->office_space_utilization_rate);
        }
        if (filterCol('utilization_rate_of_educational_equipment') == true) {
            array_push($mapping, $assetProductivity?->utilization_rate_of_educational_equipment);
        }
        if (filterCol('utilization_rate_of_technology_equipment') == true) {
            array_push($mapping, $assetProductivity?->utilization_rate_of_technology_equipment);
        }
        if (filterCol('utilization_rate_of_cultural_equipment') == true) {
            array_push($mapping, $assetProductivity?->utilization_rate_of_cultural_equipment);
        }
        if (filterCol('utilization_rate_of_sports_equipment') == true) {
            array_push($mapping, $assetProductivity?->utilization_rate_of_sports_equipment);
        }
        if (filterCol('operation_rate_of_agricultural_equipment') == true) {
            array_push($mapping, $assetProductivity?->operation_rate_of_agricultural_equipment);
        }
        if (filterCol('operation_rate_of_workshop_equipment') == true) {
            array_push($mapping, $assetProductivity?->operation_rate_of_workshop_equipment);
        }
        if (filterCol('faculty_capacity_utilization_rate') == true) {
            array_push($mapping, $assetProductivity?->faculty_capacity_utilization_rate);
        }
        if (filterCol('employee_capacity_utilization_rate') == true) {
            array_push($mapping, $assetProductivity?->employee_capacity_utilization_rate);
        }
        if (filterCol('graduate_capacity_utilization_rate') == true) {
            array_push($mapping, $assetProductivity?->graduate_capacity_utilization_rate);
        }
        if (filterCol('student_capacity_utilization_rate') == true) {
            array_push($mapping, $assetProductivity?->student_capacity_utilization_rate);
        }
        if (filterCol('ratio_of_faculty_members_to_students') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_faculty_members_to_students);
        }
        if (filterCol('ratio_of_staff_to_students') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_staff_to_students);
        }
        if (filterCol('ratio_of_faculty_members_to_teaching_professors') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_faculty_members_to_teaching_professors);
        }
        if (filterCol('ratio_of_faculty_members_to_employees') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_faculty_members_to_employees);
        }
        if (filterCol('ratio_of_unit_faculty_members_to_faculty_members_of_the_province') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_unit_faculty_members_to_faculty_members_of_the_province);
        }
        if (filterCol('ratio_of_unit_students_to_students_of_the_province') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_unit_students_to_students_of_the_province);
        }
        if (filterCol('ratio_of_unit_employees_to_provincial_employees') == true) {
            array_push($mapping, $assetProductivity?->ratio_of_unit_employees_to_provincial_employees);
        }
        if (filterCol('unit_teaching_professors_to_teaching_professors_province') == true) {
            array_push($mapping, $assetProductivity?->unit_teaching_professors_to_teaching_professors_province);
        }

        array_push($mapping, $assetProductivity?->year);
        array_push($mapping, $assetProductivity?->month);

        return $mapping;
    }

    
    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('office_space_utilization_rate') == true) {
            array_push($headings, 'نرخ بهره برداری از فضای اداری');
        }
        if (filterCol('utilization_rate_of_educational_equipment') == true) {
            array_push($headings, 'نرخ بهره برداری از فضا و تجهیزات آموزشی');
        }
        if (filterCol('utilization_rate_of_technology_equipment') == true) {
            array_push($headings, 'نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری');
        }
        if (filterCol('utilization_rate_of_cultural_equipment') == true) {
            array_push($headings, 'سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی');
        }
        if (filterCol('utilization_rate_of_sports_equipment') == true) {
            array_push($headings, 'نرخ بهره برداری از فضا و تجهیزات ورزشی');
        }
        if (filterCol('operation_rate_of_agricultural_equipment') == true) {
            array_push($headings, 'نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی');
        }
        if (filterCol('operation_rate_of_workshop_equipment') == true) {
            array_push($headings, 'ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی');
        }
        if (filterCol('faculty_capacity_utilization_rate') == true) {
            array_push($headings, 'نرخ بهره برداری از ظرفیت اعضای هیات علمی');
        }
        if (filterCol('employee_capacity_utilization_rate') == true) {
            array_push($headings, 'نرخ بهره برداری از ظرفیت کارمندان');
        }
        if (filterCol('graduate_capacity_utilization_rate') == true) {
            array_push($headings, 'نرخ بهره برداری از ظرفیت فارغ التحصیلان');
        }
        if (filterCol('student_capacity_utilization_rate') == true) {
            array_push($headings, 'نرخ بهره برداری از ظرفیت دانشجویان');
        }
        if (filterCol('ratio_of_faculty_members_to_students') == true) {
            array_push($headings, 'نسبت تعداد اعضای هیات علمی به دانشجویان');
        }
        if (filterCol('ratio_of_staff_to_students') == true) {
            array_push($headings, 'نسبت تعداد کارمندان به دانشجویان');
        }
        if (filterCol('ratio_of_faculty_members_to_teaching_professors') == true) {
            array_push($headings, 'نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس');
        }
        if (filterCol('ratio_of_faculty_members_to_employees') == true) {
            array_push($headings, 'نسبت تعداد اعضای هیات علمی به کارمندان واحد');
        }
        if (filterCol('ratio_of_unit_faculty_members_to_faculty_members_of_the_province') == true) {
            array_push($headings, 'نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان');
        }
        if (filterCol('ratio_of_unit_students_to_students_of_the_province') == true) {
            array_push($headings, 'نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان');
        }
        if (filterCol('ratio_of_unit_employees_to_provincial_employees') == true) {
            array_push($headings, 'نسبت تعداد کارمندان به میانگین تعداد کارمندان استان');
        }
        if (filterCol('unit_teaching_professors_to_teaching_professors_province') == true) {
            array_push($headings, 'نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');
        
        return $headings;
    }
    
}
