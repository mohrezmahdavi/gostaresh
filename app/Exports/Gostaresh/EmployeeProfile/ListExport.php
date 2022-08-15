<?php

namespace App\Exports\Gostaresh\EmployeeProfile;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $employeeProfiles;
    private $count = 0;

    public function __construct($employeeProfiles)
    {
        $this->employeeProfiles = $employeeProfiles;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->employeeProfiles;
    }
   
    public function map($employeeProfiles): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $employeeProfiles?->province?->name . ' - ' . $employeeProfiles?->county?->name);

        if (filterCol('department_of_education_title') == true) {
            array_push($mapping, $employeeProfiles?->department_of_education_title);
        }
        if (filterCol('number_of_non_faculty_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_non_faculty_staff);
        }
        if (filterCol('average_age_of_employees') == true) {
            array_push($mapping, $employeeProfiles?->average_age_of_employees);
        }
        if (filterCol('number_of_male_employees') == true) {
            array_push($mapping, $employeeProfiles?->number_of_male_employees);
        }
        if (filterCol('number_of_female_employees') == true) {
            array_push($mapping, $employeeProfiles?->number_of_female_employees);
        }
        if (filterCol('number_of_administrative_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_administrative_staff);
        }
        if (filterCol('number_of_training_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_training_staff);
        }
        if (filterCol('number_of_research_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_research_staff);
        }
        if (filterCol('number_of_PhD_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_PhD_staff);
        }
        if (filterCol('number_of_master_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_master_staff);
        }
        if (filterCol('number_of_expert_staff') == true) {
            array_push($mapping, $employeeProfiles?->number_of_expert_staff);
        }
        if (filterCol('number_of_diploma_and_sub_diploma_employees') == true) {
            array_push($mapping, $employeeProfiles?->number_of_diploma_and_sub_diploma_employees);
        }
        if (filterCol('number_of_employees_studying') == true) {
            array_push($mapping, $employeeProfiles?->number_of_employees_studying);
        }
        if (filterCol('growth_rate') == true) {
            array_push($mapping, $employeeProfiles?->growth_rate);
        }
        
        array_push($mapping, $employeeProfiles?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('department_of_education_title') == true) {
            array_push($headings, 'زیرنظام های آموزش عالی شهرستان');
        }
        if (filterCol('number_of_non_faculty_staff') == true) {
            array_push($headings, 'تعداد کارکنان غیر هیات علمی');
        }
        if (filterCol('average_age_of_employees') == true) {
            array_push($headings, 'میانگین سنی کارمندان');
        }
        if (filterCol('number_of_male_employees') == true) {
            array_push($headings, 'تعداد کارمندان مرد');
        }
        if (filterCol('number_of_female_employees') == true) {
            array_push($headings, 'تعداد کارمندان زن');
        }
        if (filterCol('number_of_administrative_staff') == true) {
            array_push($headings, 'تعداد کارمندان اداری');
        }
        if (filterCol('number_of_training_staff') == true) {
            array_push($headings, 'تعداد کارمندان بخش آموزشی');
        }
        if (filterCol('number_of_research_staff') == true) {
            array_push($headings, 'تعداد کارمندان بخش پژوهش');
        }
        if (filterCol('number_of_PhD_staff') == true) {
            array_push($headings, 'تعداد کارمندان با مدرک دکترا');
        }
        if (filterCol('number_of_master_staff') == true) {
            array_push($headings, 'تعداد کارمندان با مدرک کارشناسی ارشد');
        }
        if (filterCol('number_of_expert_staff') == true) {
            array_push($headings, 'تعداد کارمندان با مدرک کارشناسی');
        }
        if (filterCol('number_of_diploma_and_sub_diploma_employees') == true) {
            array_push($headings, 'تعداد کارمندان با مدرک دیپلم و زیر دیپلم');
        }
        if (filterCol('number_of_employees_studying') == true) {
            array_push($headings, 'تعداد کارمندان در حال تحصیل');
        }
        if (filterCol('growth_rate') == true) {
            array_push($headings, 'نرخ رشد کارمندان');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
