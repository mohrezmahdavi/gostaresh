<?php

namespace App\View\Components\Gostaresh\SocialHealth;

use App\Models\Index\SocialHealthStatusAnalysis;
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
        $modelQuery = SocialHealthStatusAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title' => "کاردانی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'associate_degree',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr1 = [
            'chart_title' => "کارشناسی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'bachelor_degree',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr2 = [
            'chart_title' => "کارشناسی ارشد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'masters',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "دکتری حرفه ای",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'professional_doctor',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title' => "دکتری تخصصی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'phd',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4);

        return view('components.gostaresh.social-health.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
