<?php

namespace App\View\Components\Gostaresh\NumberOfRegistrantsStatusAnalysis;

use App\Models\Index\NumberOfRegistrantsStatusAnalysis;
use Closure;
use Comma\Lachart\Classes\Lachart;
use Exception;
use Illuminate\Contracts\View\View;
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
     * @return View|Closure|string
     * @throws Exception
     */
    public function render()
    {
        $modelQuery = NumberOfRegistrantsStatusAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "تعداد ثبت نام شدگان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_registrants',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr);

       return view('components.gostaresh.number-of-registrants-status-analysis.line-chart-all-fields-by-year-component',compact("chart"));
    }
}
