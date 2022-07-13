<?php

namespace App\View\Components\Gostaresh\NumberStudentPopulation;

use App\Models\Index\NumberStudentPopulation;
use Comma\Lachart\Classes\Lachart;
use Illuminate\View\Component;

class LineChartByGenderComponent extends Component
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
        $charts_arr = [];
        $chart_arr1 = [
            'chart_title' => "مرد",
            'report_type' => 'group_by_string',
            'model' => NumberStudentPopulation::whereRequestsQuery()->where('gender_id' , 1),
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function'    => 'count',
        ];

        $chart_arr2 = [
            'chart_title' => "زن" ,
            'report_type' => 'group_by_string',
            'model' => NumberStudentPopulation::whereRequestsQuery()->where('gender_id' , 2),
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function'    => 'count',
        ];

        $chart = new Lachart($chart_arr1,$chart_arr2);
        return view('components.gostaresh.number-student-population.line-chart-by-gender-component', compact('chart'));
    }
}
