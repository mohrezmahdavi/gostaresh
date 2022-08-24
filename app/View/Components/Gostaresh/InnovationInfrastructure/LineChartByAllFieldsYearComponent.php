<?php

namespace App\View\Components\Gostaresh\InnovationInfrastructure;

use App\Models\Index\TechnologyAndInnovationInfrastructure;
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
        $modelQuery = TechnologyAndInnovationInfrastructure::whereRequestsQuery();

        $chart_arr = [
            'chart_title' => "تعداد سرای نوآوری فعال",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_active_innovation_houses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr1 = [
            'chart_title' => "تعداد شتاب دهنده فعال",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_active_accelerators',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr2 = [
            'chart_title' => "تعداد مراکز رشد فعال",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_active_growth_centers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "تعداد هسته فناور فعال",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_active_technology_cores',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr4 = [
            'chart_title' => "تعداد مدارس عالی مهارتی فعال",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_active_skill_high_schools',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title' => "تعداد مراکز توانمندسازی و آموزش مهارتی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_skill_training_centers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title' => "تعداد مراکز تحقیقاتی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_research_centers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => "تعداد دفاتر توسعه و انتقال فناوری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_development_offices',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => "تعداددفاتر کلینیک صنعت، معدن و تجارت",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_industry_trade_offices',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => "تعداد مراکز کارآفرینی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_entrepreneurship_centers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7, $chart_arr8, $chart_arr9);

        return view('components.gostaresh.innovation-infrastructure.line-chart-by-all-fields-year-component', compact('chart'));

    }
}
