<?php

namespace App\View\Components\Gostaresh\GraduateStatusAnalysis;

use App\Models\Index\GraduateStatusAnalysis;
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
        $modelQuery = GraduateStatusAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "تعداد کل فارغ التحصیلان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'total_graduates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr1 = [
            'chart_title'         => "تعداد فارغ التحصیلان شاغل",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'employed_graduates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr2 = [
            'chart_title'         => "نرخ رشد فارغ التحصیلان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'graduate_growth_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title'         => "تعداد فارغ التحصیلان شاغل در مشاغل مرتبط با رشته تحصیلی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'related_employed_graduates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title'         => "تعداد فارغ التحصیلان دارای گواهینامه مهارتی و صلاحیت حرفه ای",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'skill_certification_graduates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title'         => "تعداد فارغ التحصیلان دارای شغل در مدت 6 ماه بعد از فراغت از تحصیل",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'employed_graduates_6_months_after_graduation',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title'         => "متوسط درآمد ماهیانه فارغ التحصیلان دارای شغل مرتبط با رشته تحصیلی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'average_monthly_income_employed_graduates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart = new Lachart($chart_arr, $chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5, $chart_arr6);
        return view('components.gostaresh.graduate-status-analysis.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
