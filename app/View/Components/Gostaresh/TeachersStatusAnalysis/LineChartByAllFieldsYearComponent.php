<?php

namespace App\View\Components\Gostaresh\TeachersStatusAnalysis;

use App\Models\Index\TeachersStatusAnalysis;
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
        $modelQuery = TeachersStatusAnalysis::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => 'تعداد اعضای هیات علمی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr1 = [
            'chart_title' => 'تعداد اعضای هیئت علمی مشارکت کننده در برنامه های علمی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'scientific_programs_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr2 = [
            'chart_title' => 'تعداد اعضای هیات علمی ارتقا یافته',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'upgraded_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => 'تعداد مدرسین حق التدریس و اساتید مدعو',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_tuition_teachers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title' => 'تعداد اعضای هیات علمی مامور در سایر واحدها',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_officer_faculty_members_in_other_unit',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title' => 'تعداد اعضای هیات علمی مامور در سازمان مرکزی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_officer_faculty_members_in_central_organization',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title' => 'تعداد اعضای هیات علمی شرکت کننده در طرح تعاون',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_participant_faculty_members_in_cooperation_plan',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => 'تعداد اعضای هیات علمی انتقالی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_transfer_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => 'تعداد اعضای هیات علمی با درجه مربی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_instructor_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => 'تعداد اعضای هیات علمی با درجه استادیار',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_assistant_professor_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr10 = [
            'chart_title' => 'تعداد اعضای هیات علمی با درجه دانشیار',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_associate_professor_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr11 = [
            'chart_title' => 'تعداد اعضای هیات علمی با درجه استاد تمام',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_full_professor_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr12 = [
            'chart_title' => 'تعداد اعضای هیات علمی دارای سن کمتر از 50 سال',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_faculty_members_smaller_50_years_old',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr13 = [
            'chart_title' => 'تعداد اعضای هیات علمی فناور',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_technology_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr14 = [
            'chart_title' => 'تعداد اعضای هیات علمی نوع الف',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_faculty_members_type_a',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr15 = [
            'chart_title' => 'تعداد اعضای هیات علمی نوع ب',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_faculty_members_type_b',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr16 = [
            'chart_title' => 'تعداد اعضای هیات علمی سرآمد علمی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_top_scientific_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr17 = [
            'chart_title' => 'متوسط سطح بهره وری پژوهشی اعضای هیات علمی',
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'average_level_of_research_productivity_of_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7, $chart_arr8, $chart_arr9, $chart_arr10, $chart_arr11, $chart_arr12, $chart_arr13, $chart_arr14, $chart_arr15, $chart_arr16, $chart_arr17);
        return view('components.gostaresh.teachers-status-analysis.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
