<?php

namespace App\Exports\Gostaresh\UniversityCostsPerUnit;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $universityCosts;
    private $count = 0;

    public function __construct($universityCosts)
    {
        $this->universityCosts = $universityCosts;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->universityCosts;
    }

    public function map($universityCosts): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $universityCosts?->province?->name . ' - ' . $universityCosts?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $universityCosts?->unit);
//        }
//        if (filterCol('payment_to_faculty_members') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->payment_to_faculty_members ));
//        }
//        if (filterCol('total_running_costs') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->total_running_costs ));
//        }
//        if (filterCol('average_salary_of_faculty_members') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->average_salary_of_faculty_members ));
//        }
//        if (filterCol('average_salaries_of_faculty_members_from_research_contracts') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->average_salaries_of_faculty_members_from_research_contracts ));
//        }
//        if (filterCol('student_fees') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->student_fees ));
//        }
//        if (filterCol('average_salary_of_employees') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->average_salary_of_employees ));
//        }
//        if (filterCol('current_expenditure_growth_rate') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->current_expenditure_growth_rate ));
//        }
//        if (filterCol('cost_of_paying_office_rent') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->cost_of_paying_office_rent ));
//        }
//        if (filterCol('cost_of_rent_for_educational_building') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->cost_of_rent_for_educational_building ));
//        }
//        if (filterCol('cost_of_rent_for_research_building') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->cost_of_rent_for_research_building ));
//        }
//        if (filterCol('extra_charge_for_rent_extracurricular_building') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->extra_charge_for_rent_extracurricular_building ));
//        }
//        if (filterCol('cost_of_rent_innovation_buildings') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->cost_of_rent_innovation_buildings ));
//        }
//        if (filterCol('energy_costs_of_buildings') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->energy_costs_of_buildings ));
//        }
//        if (filterCol('cost_of_university_equipment') == true) {
//            array_push($mapping, number_format((int) $universityCosts?->cost_of_university_equipment ));
        }
        if (filterCol('training_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->training_costs ));
        }
        if (filterCol('research_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->research_costs ));
        }
        if (filterCol('innovation_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->innovation_costs ));
        }
        if (filterCol('educational_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->educational_costs ));
        }
        if (filterCol('development_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->development_costs ));
        }
        if (filterCol('cultural_sphere_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->cultural_sphere_costs ));
        }
        if (filterCol('administrative_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->administrative_costs ));
        }
        if (filterCol('information_technology_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->information_technology_costs ));
        }
        if (filterCol('International_sphere_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->International_sphere_costs ));
        }
        if (filterCol('costs_of_staff_training_and_faculty') == true) {
            array_push($mapping, number_format((int) $universityCosts?->costs_of_staff_training_and_faculty ));
        }
        if (filterCol('sports_expenses') == true) {
            array_push($mapping, number_format((int) $universityCosts?->sports_expenses ));
        }
        if (filterCol('health_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->health_costs ));
        }
        if (filterCol('entrepreneurship_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->entrepreneurship_costs ));
        }
        if (filterCol('graduate_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->graduate_costs ));
        }
        if (filterCol('branding_costs') == true) {
            array_push($mapping, number_format((int) $universityCosts?->branding_costs ));
        }

        array_push($mapping, $universityCosts?->year);
        array_push($mapping, $universityCosts?->month);

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
//        if (filterCol('payment_to_faculty_members') == true) {
//            array_push($headings, 'درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی');
//        }
//        if (filterCol('total_running_costs') == true) {
//            array_push($headings, 'کل هزینه های جاری');
//        }
//        if (filterCol('average_salary_of_faculty_members') == true) {
//            array_push($headings, 'میانگین حقوق دریافتی اعضای هیات علمی');
//        }
//        if (filterCol('average_salaries_of_faculty_members_from_research_contracts') == true) {
//            array_push($headings, 'میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی');
//        }
//        if (filterCol('student_fees') == true) {
//            array_push($headings, 'هزینه دانشجویان');
//        }
//        if (filterCol('average_salary_of_employees') == true) {
//            array_push($headings, 'میانگین حقوق دریافتی کارمندان');
//        }
//        if (filterCol('current_expenditure_growth_rate') == true) {
//            array_push($headings, 'نرخ رشد هزینه های جاری');
//        }
//        if (filterCol('cost_of_paying_office_rent') == true) {
//            array_push($headings, 'هزینه پرداخت اجاره ساختمان اداری');
//        }
//        if (filterCol('cost_of_rent_for_educational_building') == true) {
//            array_push($headings, 'هزینه پرداخت اجاره ساختمان آموزشی');
//        }
//        if (filterCol('cost_of_rent_for_research_building') == true) {
//            array_push($headings, 'هزینه پرداخت اجاره ساختمان پژوهشی');
//        }
//        if (filterCol('extra_charge_for_rent_extracurricular_building') == true) {
//            array_push($headings, 'هزینه پرداخت اجاره ساختمان فوق برنامه');
//        }
//        if (filterCol('cost_of_rent_innovation_buildings') == true) {
//            array_push($headings, 'هزینه پرداخت اجاره ساختمان فناوری و نوآوری');
//        }
//        if (filterCol('energy_costs_of_buildings') == true) {
//            array_push($headings, 'هزینه های انرژی ساختمان ها');
//        }
//        if (filterCol('cost_of_university_equipment') == true) {
//            array_push($headings, 'هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه');
//        }
        if (filterCol('training_costs') == true) {
            array_push($headings, 'هزینه های حوزه آموزش');
        }
        if (filterCol('research_costs') == true) {
            array_push($headings, 'هزینه های حوزه پژوهش');
        }
        if (filterCol('innovation_costs') == true) {
            array_push($headings, 'هزینه های حوزه فناوری و نوآوری');
        }
        if (filterCol('educational_costs') == true) {
            array_push($headings, 'هزینه های حوزه مهارت آموزشی و کارآفرینی');
        }
        if (filterCol('development_costs') == true) {
            array_push($headings, 'هزینه های حوزه تحقیق و توسعه');
        }
        if (filterCol('cultural_sphere_costs') == true) {
            array_push($headings, 'هزینه های حوزه فرهنگی');
        }
        if (filterCol('administrative_costs') == true) {
            array_push($headings, 'هزینه های حوزه اداری');
        }
        if (filterCol('information_technology_costs') == true) {
            array_push($headings, 'هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی');
        }
        if (filterCol('International_sphere_costs') == true) {
            array_push($headings, 'هزینه های حوزه بین الملل');
        }
        if (filterCol('costs_of_staff_training_and_faculty') == true) {
            array_push($headings, 'هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید');
        }
        if (filterCol('sports_expenses') == true) {
            array_push($headings, 'هزینه های حوزه ورزشی');
        }
        if (filterCol('health_costs') == true) {
            array_push($headings, 'هزینه های حوزه بهداشت و سلامت');
        }
        if (filterCol('entrepreneurship_costs') == true) {
            array_push($headings, 'هزینه های حوزه ترویج کارآفرینی و اشتغال');
        }
        if (filterCol('graduate_costs') == true) {
            array_push($headings, 'هزینه های حوزه فارغ التحصیلان');
        }
        if (filterCol('branding_costs') == true) {
            array_push($headings, 'هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان');
        }

        array_push($headings, 'سال');
        array_push($headings, 'ماه');

        return $headings;
    }

}
