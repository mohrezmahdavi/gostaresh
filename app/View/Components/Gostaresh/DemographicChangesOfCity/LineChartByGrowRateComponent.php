<?php

namespace App\View\Components\Gostaresh\DemographicChangesOfCity;

use App\Models\Index\DemographicChangesOfCity;
use Comma\Lachart\Classes\Lachart;
use Illuminate\View\Component;

class LineChartByGrowRateComponent extends Component
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
        $modelQuery = DemographicChangesOfCity::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "نمودار برحسب نرخ رشد جمعیت",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'immigration_rates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        array_push($charts_arr, $chart_arr);

        $chart = new Lachart();
        $chart->getArrayOfCharts($charts_arr);
        
        return view('components.gostaresh.demographic-changes-of-city.line-chart-by-grow-rate-component', compact('chart'));
    }
}
