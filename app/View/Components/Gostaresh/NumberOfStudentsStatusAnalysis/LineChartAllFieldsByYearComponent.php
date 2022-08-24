<?php

namespace App\View\Components\Gostaresh\NumberOfStudentsStatusAnalysis;

use App\Models\Index\NumberOfStudentsStatusAnalysis;
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
        $modelQuery = NumberOfStudentsStatusAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "مقدار",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_students',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr);
        return view('components.gostaresh.number-of-students-status-analysis.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
