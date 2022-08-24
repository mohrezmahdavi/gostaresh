<?php

namespace App\View\Components\Gostaresh\NumberOfNonMedicalFieldsOfStudy;

use App\Models\Index\NumberOfNonMedicalFieldsOfStudy;
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
        $modelQuery = NumberOfNonMedicalFieldsOfStudy::whereRequestsQuery();

        $chart_arr1 = [
            'chart_title'         => "کاردانی پیوسته",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'kardani_peyvaste_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr2 = [
            'chart_title'         => "کاردانی ناپیوسته",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'kardani_na_peyvaste_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr3 = [
            'chart_title'         => "کارشناسی پیوسته",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'karshenasi_peyvaste_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr4 = [
            'chart_title'         => "کارشناسی ناپیوسته",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'karshenasi_na_peyvaste_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr5 = [
            'chart_title'         => "کارشناسی ارشد",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'karshenasi_arshad_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr6 = [
            'chart_title'         => "دکتری حرفه ای",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'docktora_herfei_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr7 = [
            'chart_title'         => "دکتری تخصصی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'docktora_takhasosi_count',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7);

        return view('components.gostaresh.number-of-non-medical-fields-of-study.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
