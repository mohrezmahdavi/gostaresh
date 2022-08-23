<?php

namespace App\View\Components\Gostaresh\StatusAnalysisOfTheNumberOfCourse;

use App\Models\Index\StatusAnalysisOfTheNumberOfCourse;
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
        $modelQuery = StatusAnalysisOfTheNumberOfCourse::whereRequestsQuery();

        $chart_arr1 = [
            'chart_title'         => "تعداد کل دوره های تحصیلی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'total_number_of_courses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr2 = [
            'chart_title'         => "تعداد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت حضوری",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_international_Persian_language_courses_in_person',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr3 = [
            'chart_title'         => "داد دوره های تحصیلی بین المللی برگزار شده به زبان فارسی به صورت مجازی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_international_virtual_Persian_language_courses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr4 = [
            'chart_title'         => "تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت حضوری",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_international_courses_in_the_target_language_in_person',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr5 = [
            'chart_title'         => "تعداد دوره های تحصیلی بین المللی برگزار شده به زبان های کشورهای هدف به صورت مجازی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_international_courses_in_the_target_language_virtually',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5);

        return view('components.gostaresh.status-analysis-of-the-number-of-course.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
