<?php

namespace App\View\Components\Gostaresh\IndustrialExpenditureResearch;

use App\Models\Index\IndustrialExpenditureResearch;
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
        $modelQuery = IndustrialExpenditureResearch::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "مقدار",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_avg_count_record' => true,
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart = new Lachart($chart_arr);

        return view('components.gostaresh.industrial-expenditure-research.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
