<?php

namespace App\View\Components\Gostaresh\CulturalIndicatorsStatusAnalysis;

use App\Models\Index\CulturalIndicatorsStatusAnalysis;
use Comma\Lachart\Classes\Lachart;
use Illuminate\View\Component;

class LineChartByAllFieldsYearComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $modelQuery = CulturalIndicatorsStatusAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title' => "نمره وضعیت کانون های فرهنگی واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cultural_centers_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr1 = [
            'chart_title' => "نمره وضعیت نشریات چاپی و الکترونیکی واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'printed_publications_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr2 = [
            'chart_title' => "نمره وضعیت تشکلهای فرهنگی واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cultural_organizations_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "نمره وضعیت آراستگی و پوشش دانشجویان، اساتید و کارکنان واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'people_coverage_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr4 = [
            'chart_title' => "نمره وضعیت کیفی و کمی کرسی های آزاد اندیشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'free_thinking_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title' => "نمره وضعیت تعامل با فضای مجازی در واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'interact_with_cyberspace_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title' => "نمره وضعیت برنامه ها و رویدادهای ثابت فرهنگی واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'fixed_cultural_events_status_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => "میزان افتخارات و جوایز فرهنگی کسب شده در واحد در سطوح مختلف منطقه ای و ملی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amounts_of_honors_and_awards',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => "میزان تولیدات در صنایع فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cultural_industry_products',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => "سطح ابتکارات و نوآوری های فرهنگی در واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'level_of_initiatives',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr10 = [
            'chart_title' => "امتیاز طراحی و اجرای برنامه های فاخر",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'points_for_running_luxury_programs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr11 = [
            'chart_title' => "نمره میزان مشارکت در انتخابات",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'election_turnout_score',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr12 = [
            'chart_title' => "امتیاز برنامه های آموزش مهارت های فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'score_cultural_skills_training_programs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr13 = [
            'chart_title' => "نمره مشارکت فرهنگی اساتید بسیجی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'score_of_cultural_participation_of_Basiji_professors',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr14 = [
            'chart_title' => "میزان مشارکت اساتید واحد در ارائه مشاوره فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'participation_of_unit_professors_in_cultural_counseling',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr15 = [
            'chart_title' => "جایگاه دانشگاه بعنوان قطب فرهنگی شهر",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'position_of_the_university_as_cultural_center',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr16 = [
            'chart_title' => "نمره برنامه های ویژه حل مسایل فرهنگی اختصاصی واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'score_cultural_programs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr17 = [
            'chart_title' => "نمره برنامه های فرهنگی خانواده های اساتید و کارکنان واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'score_Families_of_professors',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr18 = [
            'chart_title' => "نمره برنامه های فرهنگی اساتید واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'score_of_professors',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr19 = [
            'chart_title' => "میزان رضایتمندی از عملکرد مدیران در واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'satisfaction_of_managers_performance',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr20 = [
            'chart_title' => "درصد دانشجویان شرکت کننده در مسابقات ورزشی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percentage_of_students_participating_in_sports_competitions',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr21 = [
            'chart_title' => "درصد دانشجویان شرکت کننده در مسابقات فرهنگی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی به تفکیک مقطع تحصیلی و جنسیت",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percentage_of_students_participating_in_cultural_competitions',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr22 = [
            'chart_title' => "درصد دانشجویان عضو تشکل های دانشجویی واحد دانشگاهی از کل دانشجویان آن واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percentage_of_students_in_student_organizations',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr23 = [
            'chart_title' => "نسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'student_counseling_centers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr24 = [
            'chart_title' => "درصد دانشجویان مراجعه کننده به مراکز راهنمایی و مشاوره دانشجویی نسبت به کل دانشنسبت تعداد مراکز راهنمایی و مشاوره دانشجویی واحد دانشگاهی به کل دانشجویان آن واحدجویان واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percentage_of_students_referring_to_student_counseling_centers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr25 = [
            'chart_title' => "رتبه کلی فرهنگی واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'general_cultural_rank_of_the_university_unit',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7, $chart_arr8, $chart_arr9, $chart_arr10,
            $chart_arr11, $chart_arr12, $chart_arr13, $chart_arr14, $chart_arr15, $chart_arr16, $chart_arr17, $chart_arr18, $chart_arr19, $chart_arr20,
            $chart_arr21, $chart_arr22, $chart_arr23, $chart_arr24, $chart_arr25);

        return view('components.gostaresh.cultural-indicators-status-analysis.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
