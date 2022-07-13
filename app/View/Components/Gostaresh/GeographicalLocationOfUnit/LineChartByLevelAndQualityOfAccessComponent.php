<?php

namespace App\View\Components\Gostaresh\GeographicalLocationOfUnit;

use App\Models\Index\GeographicalLocationOfUnit;
use Comma\Lachart\Classes\Lachart;
use Illuminate\View\Component;

class LineChartByLevelAndQualityOfAccessComponent extends Component
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

        $charts_arr = [];
        $chart_arr1 = [
            'chart_title' => "مناسب",
            'report_type' => 'group_by_string',
            'model' => GeographicalLocationOfUnit::whereRequestsQuery()->where('level_and_quality_of_access' , 1),
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function'    => 'count',
        ];

        $chart_arr2 = [
            'chart_title' => "نامناسب",
            'report_type' => 'group_by_string',
            'model' => GeographicalLocationOfUnit::whereRequestsQuery()->where('level_and_quality_of_access' , 2),
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function'    => 'count',
        ];

        $chart = new Lachart($chart_arr1,$chart_arr2);
        return view('components.gostaresh.geographical-location-of-unit.line-chart-by-level-and-quality-of-access-component', compact('chart'));
    }
}
