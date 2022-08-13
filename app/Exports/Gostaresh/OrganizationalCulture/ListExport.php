<?php

namespace App\Exports\Gostaresh\OrganizationalCulture;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $organizationalCultures;
    private $count = 0;

    public function __construct($organizationalCultures)
    {
        $this->organizationalCultures = $organizationalCultures;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->organizationalCultures;
    }
   
    public function map($organizationalCultures): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $organizationalCultures?->province?->name . ' - ' . $organizationalCultures?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $organizationalCultures?->unit);
        }
        if (filterCol('student_satisfaction') == true) {
            array_push($mapping, $organizationalCultures?->student_satisfaction);
        }
        if (filterCol('unique_organizational_learning_capability') == true) {
            array_push($mapping, $organizationalCultures?->unique_organizational_learning_capability);
        }
        if (filterCol('students_religious_beliefs') == true) {
            array_push($mapping, $organizationalCultures?->students_religious_beliefs);
        }
        if (filterCol('student_study_research_culture') == true) {
            array_push($mapping, $organizationalCultures?->student_study_research_culture);
        }
        if (filterCol('hijab_culture_of_students') == true) {
            array_push($mapping, $organizationalCultures?->hijab_culture_of_students);
        }
        if (filterCol('culture_of_participation') == true) {
            array_push($mapping, $organizationalCultures?->culture_of_participation);
        }
        if (filterCol('faculty_members_self_confidence') == true) {
            array_push($mapping, $organizationalCultures?->faculty_members_self_confidence);
        }
        if (filterCol('amount_of_physical_elements') == true) {
            array_push($mapping, $organizationalCultures?->amount_of_physical_elements);
        }
        if (filterCol('percentage_of_sample_professors_in_unit') == true) {
            array_push($mapping, $organizationalCultures?->percentage_of_sample_professors_in_unit);
        }
        if (filterCol('percentage_of_sample_professors_in_province') == true) {
            array_push($mapping, $organizationalCultures?->percentage_of_sample_professors_in_province);
        }
        if (filterCol('percentage_of_sample_students_in_unit') == true) {
            array_push($mapping, $organizationalCultures?->percentage_of_sample_students_in_unit);
        }
        if (filterCol('percentage_of_sample_students_in_province') == true) {
            array_push($mapping, $organizationalCultures?->percentage_of_sample_students_in_province);
        }
        if (filterCol('brand_influence_in_the_province') == true) {
            array_push($mapping, $organizationalCultures?->brand_influence_in_the_province);
        }
        if (filterCol('level_of_intelligence') == true) {
            array_push($mapping, $organizationalCultures?->level_of_intelligence);
        }
        if (filterCol('axial_program') == true) {
            array_push($mapping, $organizationalCultures?->axial_program);
        }
        
        array_push($mapping, $organizationalCultures?->year);

        return $mapping;
    }

    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('student_satisfaction') == true) {
            array_push($headings, 'میزان رضایت دانشجویان و فارغ التحصیلان واحد از خدمات دانشگاه');
        }
        if (filterCol('unique_organizational_learning_capability') == true) {
            array_push($headings, 'قابلیت یادگیری سازمانی واحد');
        }
        if (filterCol('students_religious_beliefs') == true) {
            array_push($headings, 'میزان پایبندی به فضایل اخلاقی و باورهای دینی در میان دانشجویان واحد دانشگاهی');
        }
        if (filterCol('student_study_research_culture') == true) {
            array_push($headings, 'میزان پایبندی به فرهنگ تحقیق مطالعه، تتبع و تحقیق در میان دانشجویان واحد');
        }
        if (filterCol('hijab_culture_of_students') == true) {
            array_push($headings, 'میزان پایبندی به فرهنگ عفاف و حجاب و سبک پوشش اسلامی در میان دانشجویان واحد');
        }
        if (filterCol('culture_of_participation') == true) {
            array_push($headings, 'سطح فرهنگ مشارکت پذیری و کار گروهی در واحد');
        }
        if (filterCol('faculty_members_self_confidence') == true) {
            array_push($headings, 'سطح خودباوری و تعلق سازمانی در میان اعضای هیات علمی و کارکنان واحد');
        }
        if (filterCol('amount_of_physical_elements') == true) {
            array_push($headings, 'میزان المان های فیزیکی و نمایه های بصری هویت دار در واحد دانشگاهی');
        }
        if (filterCol('percentage_of_sample_professors_in_unit') == true) {
            array_push($headings, 'درصد اساتید نمونه واحد دانشگاهی از کل اساتید نمونه دانشگاه آزاد اسلامی استان');
        }
        if (filterCol('percentage_of_sample_professors_in_province') == true) {
            array_push($headings, 'درصد اساتید نمونه دانشگاه آزاد اسلامی استان از کل اساتید نمونه دانشگاه آزاد اسلامی');
        }
        if (filterCol('percentage_of_sample_students_in_unit') == true) {
            array_push($headings, 'درصد دانشجویان نمونه واحد دانشگاهی از کل دانشجویان نمونه دانشگاه آزاد اسلامی استان');
        }
        if (filterCol('percentage_of_sample_students_in_province') == true) {
            array_push($headings, 'درصد دانشجویان نمونه دانشگاه آزاد اسلامی استان از کل دانشجویان نمونه دانشگاه آزاد اسلامی');
        }
        if (filterCol('brand_influence_in_the_province') == true) {
            array_push($headings, 'میزان نفوذ برند دانشگاه آزاد اسلامی و هویت بصری آن در سطح شهرستان/استان');
        }
        if (filterCol('level_of_intelligence') == true) {
            array_push($headings, 'میزان سامانه سپاری و هوشمندسازی ساختار تشکیلاتی، فرایندها و نظام های مدیریت در واحد');
        }
        if (filterCol('axial_program') == true) {
            array_push($headings, 'برنامه محوری (وجود برنامه راهبردی-عملیاتی در سطح واحد/استان مبتنی بر طرح آمایش)');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
