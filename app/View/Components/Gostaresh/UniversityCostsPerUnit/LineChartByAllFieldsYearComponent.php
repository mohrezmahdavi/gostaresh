<?php

namespace App\View\Components\Gostaresh\UniversityCostsPerUnit;

use App\Models\Index\UniversityCostsPerUnit;
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
        $modelQuery = UniversityCostsPerUnit::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "هزینه های حوزه آموزش",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'training_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr1 = [
            'chart_title' => "هزینه های حوزه پژوهش",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'research_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr2 = [
            'chart_title' => "هزینه های حوزه فناوری و نوآوری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'innovation_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr3 = [
            'chart_title' => "هزینه های حوزه مهارت آموزشی و کارآفرینی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'educational_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr4 = [
            'chart_title' => "هزینه های حوزه تحقیق و توسعه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'development_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr5 = [
            'chart_title' => "هزینه های حوزه فرهنگی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cultural_sphere_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr6 = [
            'chart_title' => "هزینه های حوزه اداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'administrative_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr7 = [
            'chart_title' => "هزینه های حوزه فناوری اطلاعات و زیرساخت های فضای مجازی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'information_technology_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr8 = [
            'chart_title' => "هزینه های حوزه بین الملل",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'International_sphere_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr9 = [
            'chart_title' => "هزینه های حوزه آموزش ضمن خدمت کارکنان و اساتید",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'costs_of_staff_training_and_faculty',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr10 = [
            'chart_title' => "هزینه های حوزه ورزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'sports_expenses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr11 = [
            'chart_title' => "هزینه های حوزه بهداشت و سلامت",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'health_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr12 = [
            'chart_title' => "هزینه های حوزه ترویج کارآفرینی و اشتغال",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'entrepreneurship_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr13 = [
            'chart_title' => "هزینه های حوزه فارغ التحصیلان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'graduate_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr14 = [
            'chart_title' => "هزینه های حوزه برند سازی و تبلیغات و جذب دانشجویان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'branding_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4,$chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8,$chart_arr9,$chart_arr10,$chart_arr11,$chart_arr12,$chart_arr13,$chart_arr14);

        return view('components.gostaresh.university-costs-per-unit.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
