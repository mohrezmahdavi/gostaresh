<?php

namespace App\View\Components\Gostaresh\AssetProductivity;

use App\Models\Index\IndexOfAssetProductivity;
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
        $modelQuery = IndexOfAssetProductivity::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "نرخ بهره برداری از فضای اداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'office_space_utilization_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr1 = [
            'chart_title' => "نرخ بهره برداری از فضا و تجهیزات آموزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'utilization_rate_of_educational_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr2 = [
            'chart_title' => "نرخ بهره برداری از فضای و تجهیزات فناوری و نوآوری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'utilization_rate_of_technology_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr3 = [
            'chart_title' => "سرانه نرخ بهره برداری از فضا و تجهیزات فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'utilization_rate_of_cultural_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr4 = [
            'chart_title' => "نرخ بهره برداری از فضا و تجهیزات ورزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'utilization_rate_of_sports_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr5 = [
            'chart_title' => "نرخ بهره برداری از تجهیزات و فضای کشاورزی و زراعی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'operation_rate_of_agricultural_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr6 = [
            'chart_title' => "ﻧـﺮخﺑﻬـﺮهﺑـﺮداری ازتجهیزات و فضای کارگاهی و آزمایشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'operation_rate_of_workshop_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr7 = [
            'chart_title' => "نرخ بهره برداری از ظرفیت اعضای هیات علمی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'faculty_capacity_utilization_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr8 = [
            'chart_title' => "نرخ بهره برداری از ظرفیت کارمندان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'employee_capacity_utilization_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr9 = [
            'chart_title' => "نرخ بهره برداری از ظرفیت فارغ التحصیلان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'graduate_capacity_utilization_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr10 = [
            'chart_title' => "نرخ بهره برداری از ظرفیت دانشجویان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'student_capacity_utilization_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr11 = [
            'chart_title' => "نسبت تعداد اعضای هیات علمی به دانشجویان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_faculty_members_to_students',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr12 = [
            'chart_title' => "نسبت تعداد کارمندان به دانشجویان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_staff_to_students',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr13 = [
            'chart_title' => "نسبت تعداد اعضای هیات علمی به تعداد اساتید مدعو و حق التدریس",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_faculty_members_to_teaching_professors',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr14 = [
            'chart_title' => "نسبت تعداد اعضای هیات علمی به کارمندان واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_faculty_members_to_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr15 = [
            'chart_title' => "نسبت تعداد اعضای هیات علمی به میانگین تعداد اعضای هیات علمی استان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_unit_faculty_members_to_faculty_members_of_the_province',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr16 = [
            'chart_title' => "نسبت تعداد دانشجویان به میانگین تعداد دانشجویان استان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_unit_students_to_students_of_the_province',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr17 = [
            'chart_title' => "نسبت تعداد کارمندان به میانگین تعداد کارمندان استان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'ratio_of_unit_employees_to_provincial_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr18 = [
            'chart_title' => "نسبت تعداد اساتید مدعو و حق التدریس به میانگین تعداد اساتید مدعو و حق التدریس استان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'unit_teaching_professors_to_teaching_professors_province',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8,$chart_arr9,$chart_arr10,$chart_arr11,$chart_arr12,$chart_arr13,$chart_arr14,$chart_arr15,$chart_arr16,$chart_arr17,$chart_arr18);

        return view('components.gostaresh.asset-productivity.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
