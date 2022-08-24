<?php

namespace App\View\Components\Gostaresh\InternationalTechnology;

use App\Models\Index\InternationalTechnology;
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
        $modelQuery = InternationalTechnology::whereRequestsQuery();

        $chart_arr = [
            'chart_title' => "تعداد مشارکت در انتقال دانش فنی/ فناوری انتقال یافته از خارج به داخل کشور (با ارائه گواهی مقام مجاز)",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_participation',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr1 = [
            'chart_title' => "تعداد خدمات فنی و مشاوره ای ارایه شده به موسسات یا شرکت های خارجی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_technical_services',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];


        $chart_arr2 = [
            'chart_title' => "میزان کسب درآمد از خدمات فنی و مشاوره ای بین المللی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'earnings',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "تعداد ثبت و یا فایلینگ اختراعات بین المللی (Patent) در ۵ سال اخیر",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_international_inventions',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title' => "تعداد شرکت های دانش بنیان با فعالیت بین المللی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_international_knowledge_based_companies',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4);

        return view('components.gostaresh.international-technology.line-chart-by-all-fields-year-component', compact('chart'));

    }
}
