<?php

namespace App\Exports\Gostaresh\CulturalIndicators;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ListExport implements FromCollection, WithMapping, WithHeadings
{
    private $culturalIndicators;
    private $count = 0;

    public function __construct($culturalIndicators)
    {
        $this->culturalIndicators = $culturalIndicators;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->culturalIndicators;
    }
   
    public function map($culturalIndicators): array
    {
        $this->count = $this->count + 1;
        $mapping = [$this->count];
        array_push($mapping, $culturalIndicators?->province?->name . ' - ' . $culturalIndicators?->county?->name);

        if (filterCol('unit') == true) {
            array_push($mapping, $culturalIndicators?->unit);
        }
        if (filterCol('cultural_centers_status_score') == true) {
            array_push($mapping, $culturalIndicators?->cultural_centers_status_score);
        }
        if (filterCol('printed_publications_status_score') == true) {
            array_push($mapping, $culturalIndicators?->printed_publications_status_score);
        }
        if (filterCol('cultural_organizations_status_score') == true) {
            array_push($mapping, $culturalIndicators?->cultural_organizations_status_score);
        }
        if (filterCol('people_coverage_status_score') == true) {
            array_push($mapping, $culturalIndicators?->people_coverage_status_score);
        }
        if (filterCol('free_thinking_status_score') == true) {
            array_push($mapping, $culturalIndicators?->free_thinking_status_score);
        }
        if (filterCol('interact_with_cyberspace_status_score') == true) {
            array_push($mapping, $culturalIndicators?->interact_with_cyberspace_status_score);
        }
        if (filterCol('fixed_cultural_events_status_score') == true) {
            array_push($mapping, $culturalIndicators?->fixed_cultural_events_status_score);
        }
        if (filterCol('amounts_of_honors_and_awards') == true) {
            array_push($mapping, $culturalIndicators?->amounts_of_honors_and_awards);
        }
        if (filterCol('cultural_industry_products') == true) {
            array_push($mapping, $culturalIndicators?->cultural_industry_products);
        }
        if (filterCol('level_of_initiatives') == true) {
            array_push($mapping, $culturalIndicators?->level_of_initiatives);
        }
        if (filterCol('points_for_running_luxury_programs') == true) {
            array_push($mapping, $culturalIndicators?->points_for_running_luxury_programs);
        }
        if (filterCol('election_turnout_score') == true) {
            array_push($mapping, $culturalIndicators?->election_turnout_score);
        }
        if (filterCol('score_cultural_skills_training_programs') == true) {
            array_push($mapping, $culturalIndicators?->score_cultural_skills_training_programs);
        }
        if (filterCol('score_of_cultural_participation_of_Basiji_professors') == true) {
            array_push($mapping, $culturalIndicators?->score_of_cultural_participation_of_Basiji_professors);
        }
        if (filterCol('participation_of_unit_professors_in_cultural_counseling') == true) {
            array_push($mapping, $culturalIndicators?->participation_of_unit_professors_in_cultural_counseling);
        }
        if (filterCol('position_of_the_university_as_cultural_center') == true) {
            array_push($mapping, $culturalIndicators?->position_of_the_university_as_cultural_center);
        }
        if (filterCol('score_cultural_programs') == true) {
            array_push($mapping, $culturalIndicators?->score_cultural_programs);
        }
        if (filterCol('score_Families_of_professors') == true) {
            array_push($mapping, $culturalIndicators?->score_Families_of_professors);
        }
        if (filterCol('score_of_professors') == true) {
            array_push($mapping, $culturalIndicators?->score_of_professors);
        }
        if (filterCol('satisfaction_of_managers_performance') == true) {
            array_push($mapping, $culturalIndicators?->satisfaction_of_managers_performance);
        }
        if (filterCol('percentage_of_students_participating_in_sports_competitions') == true) {
            array_push($mapping, $culturalIndicators?->percentage_of_students_participating_in_sports_competitions);
        }
        if (filterCol('percentage_of_students_participating_in_cultural_competitions') == true) {
            array_push($mapping, $culturalIndicators?->percentage_of_students_participating_in_cultural_competitions);
        }
        if (filterCol('percentage_of_students_in_student_organizations') == true) {
            array_push($mapping, $culturalIndicators?->percentage_of_students_in_student_organizations);
        }
        if (filterCol('student_counseling_centers') == true) {
            array_push($mapping, $culturalIndicators?->student_counseling_centers);
        }
        if (filterCol('percentage_of_students_referring_to_student_counseling_centers') == true) {
            array_push($mapping, $culturalIndicators?->percentage_of_students_referring_to_student_counseling_centers);
        }
        if (filterCol('general_cultural_rank_of_the_university_unit') == true) {
            array_push($mapping, $culturalIndicators?->general_cultural_rank_of_the_university_unit);
        }

        array_push($mapping, $culturalIndicators?->year);

        return $mapping;
    }


    public function headings(): array
    {
        $headings = ["#"];
        array_push($headings, 'شهرستان');

        if (filterCol('unit') == true) {
            array_push($headings, 'واحد');
        }
        if (filterCol('cultural_centers_status_score') == true) {
            array_push($headings, 'نمره وضعیت کانون های فرهنگی واحد دانشگاهی');
        }
        if (filterCol('printed_publications_status_score') == true) {
            array_push($headings, 'نمره وضعیت نشریات چاپی و الکترونیکی واحد');
        }
        if (filterCol('cultural_organizations_status_score') == true) {
            array_push($headings, 'نمره وضعیت تشکلهای فرهنگی واحد');
        }
        if (filterCol('people_coverage_status_score') == true) {
            array_push($headings, 'نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد');
        }
        if (filterCol('free_thinking_status_score') == true) {
            array_push($headings, 'نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی');
        }
        if (filterCol('interact_with_cyberspace_status_score') == true) {
            array_push($headings, 'نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی');
        }
        if (filterCol('fixed_cultural_events_status_score') == true) {
            array_push($headings, 'نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد');
        }
        if (filterCol('amounts_of_honors_and_awards') == true) {
            array_push($headings, 'میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی');
        }
        if (filterCol('cultural_industry_products') == true) {
            array_push($headings, 'میزان تولیدات در صنایع فرهنگی');
        }
        if (filterCol('level_of_initiatives') == true) {
            array_push($headings, 'سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی');
        }
        if (filterCol('points_for_running_luxury_programs') == true) {
            array_push($headings, 'امتیاز طراحی و اجرای برنامه های فاخر');
        }
        if (filterCol('election_turnout_score') == true) {
            array_push($headings, 'نمره میزان مشارکت در انتخابات');
        }
        if (filterCol('score_cultural_skills_training_programs') == true) {
            array_push($headings, 'امتیاز برنامه های آموزش مهارت های فرهنگی');
        }
        if (filterCol('score_of_cultural_participation_of_Basiji_professors') == true) {
            array_push($headings, 'نمره مشارکت فرهنگی اساتید بسیجی');
        }
        if (filterCol('participation_of_unit_professors_in_cultural_counseling') == true) {
            array_push($headings, 'میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی');
        }
        if (filterCol('position_of_the_university_as_cultural_center') == true) {
            array_push($headings, 'جایگاه دانشگاه بعنوان قطب فرهنگی شهر');
        }
        if (filterCol('score_cultural_programs') == true) {
            array_push($headings, 'نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی');
        }
        if (filterCol('score_Families_of_professors') == true) {
            array_push($headings, 'نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی');
        }
        if (filterCol('score_of_professors') == true) {
            array_push($headings, 'نمره برنامه های فرهنگی اساتید واحد دانشگاهی');
        }
        if (filterCol('satisfaction_of_managers_performance') == true) {
            array_push($headings, 'میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی');
        }
        if (filterCol('percentage_of_students_participating_in_sports_competitions') == true) {
            array_push($headings, 'درصد دانشجویان شرکت کننده در مسابقات ورزشی');
        }
        if (filterCol('percentage_of_students_participating_in_cultural_competitions') == true) {
            array_push($headings, 'درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی');
        }
        if (filterCol('percentage_of_students_in_student_organizations') == true) {
            array_push($headings, 'درصد دانشجویان عضو تشکل های دانشجویی');
        }
        if (filterCol('student_counseling_centers') == true) {
            array_push($headings, 'نسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد');
        }
        if (filterCol('percentage_of_students_referring_to_student_counseling_centers') == true) {
            array_push($headings, 'درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره');
        }
        if (filterCol('general_cultural_rank_of_the_university_unit') == true) {
            array_push($headings, 'رتبه کلی فرهنگی واحد دانشگاهی');
        }

        array_push($headings, 'سال');
        
        return $headings;
    }
}
