<?php

namespace App\View\Components\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted;

use App\Models\Index\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted;
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
        $modelQuery = AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "میانگین رتبه آزمون 30 درصد اول پذیرفته شدگان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'average_test_score_of_the_first_thirty_percent_of_admitted',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr);

        return view('components.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
