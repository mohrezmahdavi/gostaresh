<?php

namespace App\View\Components\Gostaresh\CreditAndAsset;

use App\Models\Index\CreditAndAssetAnalysis;
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
        $modelQuery = CreditAndAssetAnalysis::whereRequestsQuery();

        $chart_arr = [
            'chart_title' => "اعتبارات اداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'administrative_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr1 = [
            'chart_title' => "اعتبارات آموزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'educational_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr2 = [
            'chart_title' => "اعتبارات پژوهشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'research_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "اعتبارات فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cultural_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr4 = [
            'chart_title' => "اعتبارات فناورانه و نوآورانه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'innovative_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title' => "اعتبارات حوزه مهارتی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'skills_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title' => "کل اعتبارات دانشگاه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_University_credits',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => "کل دارایی های دانشگاه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_university_assets',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7);

        return view('components.gostaresh.credit-and-asset.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
