<?php

namespace App\View\Components\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmitted;

use App\Models\Index\AverageTestScoreOfTheLastFivePercentOfAdmitted;
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
        $modelQuery = AverageTestScoreOfTheLastFivePercentOfAdmitted::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "مقدار میانگین رتبه آزمون 5 درصد آخر پذیرفته شدگان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'average_test_score_of_the_last_five_percent_of_admitted',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr);

        return view('components.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
