<?php

namespace App\View\Components\Gostaresh\RoadmapDesired;

use App\Models\Index\RoadmapToAchieveDesiredSituation;
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
        $modelQuery = RoadmapToAchieveDesiredSituation::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "شماره بسته متناظر از سند تحول دانشگاه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'package_number',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr1 = [
            'chart_title' => "شماره راهکنش متناظر از سند تحول دانشگاه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'transformation_document',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart = new Lachart($chart_arr,$chart_arr1);

        return view('components.gostaresh.roadmap-desired.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
