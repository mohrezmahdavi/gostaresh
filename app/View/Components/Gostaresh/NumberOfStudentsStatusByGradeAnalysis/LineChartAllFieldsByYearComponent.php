<?php

namespace App\View\Components\Gostaresh\NumberOfStudentsStatusByGradeAnalysis;

use App\Models\Index\NumberOfStudentsStatusByGradeAnalysis;
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
     * @return View
     * @throws Exception
     */
    public function render()
    {
        $modelQuery = NumberOfStudentsStatusByGradeAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "مقدار",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_students',
            'aggregate_transform' => fn($value) => $value
        ];

        $chart = new Lachart($chart_arr);

        return view('components.gostaresh.number-of-students-status-by-grade-analysis.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
