<?php

namespace App\View\Components\Gostaresh\GraduatesOfHigherEducationCenters;

use Comma\Lachart\Classes\Lachart;
use Illuminate\View\Component;

class LineChartAllFieldsByYearComponent extends Component
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
        $modelQuery = \App\Models\Index\GraduatesOfHigherEducationCenters::whereRequestsQuery();

        $chart_arr1 = [
            'chart_title'         => "کاردانی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'associate_degree',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr2 = [
            'chart_title'         => "کارشناسی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'bachelor_degree',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr3 = [
            'chart_title'         => "کارشناسی ارشد",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'masters',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr1, $chart_arr2, $chart_arr3);

        return view('components.gostaresh.graduates-of-higher-education-centers.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
