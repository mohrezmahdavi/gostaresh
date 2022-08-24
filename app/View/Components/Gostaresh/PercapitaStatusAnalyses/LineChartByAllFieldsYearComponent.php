<?php

namespace App\View\Components\Gostaresh\PercapitaStatusAnalyses;

use App\Models\Index\PercapitaStatusAnalysis;
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
        $modelQuery = PercapitaStatusAnalysis::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "سرانه فضای اداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_office_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr1 = [
            'chart_title' => "سرانه فضای آموزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_educational_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr2 = [
            'chart_title' => "سرانه فضای فناوری و نوآوری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_innovation_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr3 = [
            'chart_title' => "سرانه فضای فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_cultural_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr4 = [
            'chart_title' => "سرانه فضای عمرانی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_civil_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr5 = [
            'chart_title' => "ساختمان در دست احداث",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'building_under_construction',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr6 = [
            'chart_title' => "سرانه اقامتی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_residential',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr7 = [
            'chart_title' => "سرانه ساختمان های بهره بردار",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_operating_buildings',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => "سرانه فضای ورزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_sports_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => "سرانه فضای اعیانی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_aristocratic_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr10 = [
            'chart_title' => "سرانه فضای عرصه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'percapita_arena_space',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8,$chart_arr9,$chart_arr10);

        return view('components.gostaresh.percapita-status-analyses.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
