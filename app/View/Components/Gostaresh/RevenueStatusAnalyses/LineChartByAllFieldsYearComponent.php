<?php

namespace App\View\Components\Gostaresh\RevenueStatusAnalyses;

use App\Models\Index\RevenueStatusAnalysis;
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
        $modelQuery = RevenueStatusAnalysis::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "کل درآمد ها",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_revenue',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr1 = [
            'chart_title' => "درآمد حاصل از شهریه دانشجویان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'income_from_student_tuition',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr2 = [
            'chart_title' => "درصد درآمد حاصل از فروش فناوری و طرح های تجاری سازی شده",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'income_from_commercialized_technologies',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr3 = [
            'chart_title' => "درصد درآمد حاصل از فعالیت های تحقیق و توسعه واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'income_from_research_activities',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr4 = [
            'chart_title' => "درآمدهای حاصل از مهارت آموزی، فعالیت های کاربنیان و کارآفرینی واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'income_from_skills_training',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr5 = [
            'chart_title' => "نرخ رشد درآمدهای عملیاتی واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'operating_income_growth_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr6 = [
            'chart_title' => "مجموع درآمدهای غیر شهریه ای واحد",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_non_tuition_income',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr7 = [
            'chart_title' => "مجموع درآمد های ناشی از فعالیت های بین المللی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_international_income',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr8 = [
            'chart_title' => "درآمد ناشی از سهامداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'shareholder_income',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4, $chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8);

        return view('components.gostaresh.revenue-status-analyses.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
