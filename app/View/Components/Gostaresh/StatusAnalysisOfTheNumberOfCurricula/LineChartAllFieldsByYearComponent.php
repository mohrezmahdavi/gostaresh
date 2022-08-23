<?php

namespace App\View\Components\Gostaresh\StatusAnalysisOfTheNumberOfCurricula;

use App\Models\Index\StatusAnalysisOfTheNumberOfCurricula;
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
        $modelQuery = StatusAnalysisOfTheNumberOfCurricula::whereRequestsQuery();

        $chart_arr1 = [
            'chart_title'         => "تعداد کل برنامه های درسی (رشته گرایش ها)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'total_number_of_curricula',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr2 = [
            'chart_title'         => "تعداد برنامه های درسی بازنگری و اصلاح شده با رویکرد مهارت آموزی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_modified_curricula',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr3 = [
            'chart_title'         => "برنامه های درسی جدید میان رشته ای مورد اجرا",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'new_interdisciplinary_curricula_implemented',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr4 = [
            'chart_title'         => "کل برنامه های درسی جدید میان رشته ای مورد اجرا",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'complete_new_interdisciplinary_curricula',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr5 = [
            'chart_title'         => "تعداد برنامه های درسی مشترک اجرا شده با سایر دانشگاه های جهان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_common_curricula_with_the_world',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr6 = [
            'chart_title'         => "تعداد برنامه درسی تدوین شده جهت تاسیس رشته جدید تحصیلی توسط واحد دانشگاهی مورد نظر",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_curricula_developed',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5, $chart_arr6);

        return view('components.gostaresh.status-analysis-of-the-number-of-curricula.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
