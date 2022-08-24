<?php

namespace App\View\Components\Gostaresh\EmployeeProfile;

use App\Models\Index\EmployeeProfile;
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
        
        $modelQuery = EmployeeProfile::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "تعداد کارکنان غیر هیات علمی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_non_faculty_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr1 = [
            'chart_title' => "میانگین سنی کارمندان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'average_age_of_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr2 = [
            'chart_title' => "تعداد کارمندان مرد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_male_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "تعداد کارمندان زن",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_female_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title' => "تعداد کارمندان اداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_administrative_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title' => "تعداد کارمندان بخش آموزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_training_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr6 = [
            'chart_title' => "تعداد کارمندان بخش پژوهش",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_research_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => "تعداد کارمندان با مدرک دکترا",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_PhD_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr8 = [
            'chart_title' => "تعداد کارمندان با مدرک کارشناسی ارشد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_master_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => "تعداد کارمندان با مدرک کارشناسی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_expert_staff',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr10 = [
            'chart_title' => "تعداد کارمندان با مدرک دیپلم و زیر دیپلم",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_diploma_and_sub_diploma_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr11 = [
            'chart_title' => "تعداد کارمندان در حال تحصیل",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_employees_studying',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr12 = [
            'chart_title' => "نرخ رشد کارمندان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'growth_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        array_push($charts_arr, $chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8,$chart_arr9,$chart_arr10,$chart_arr11,$chart_arr12,);

        $chart = new Lachart();
        $chart->getArrayOfCharts($charts_arr);

        return view('components.gostaresh.employee-profile.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
