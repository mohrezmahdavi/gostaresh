<?php

namespace App\View\Components\Gostaresh\AcademicMajorEducational;

use Comma\Lachart\Classes\Lachart;
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     * @throws \Exception
     */
    public function render()
    {
        $modelQuery = \App\Models\Index\AcademicMajorEducational::whereRequestsQuery();

        $chart_arr = [
            'chart_title'         => "دانشگاه آزاد اسلامی واحد(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'azad_eslami_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr1 = [
            'chart_title'         => "دانشگاه آزاد اسلامی واحد(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'azad_eslami_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr2 = [
            'chart_title'         => "دولتی(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'dolati_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr3 = [
            'chart_title'         => "دولتی(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'dolati_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr4 = [
            'chart_title'         => "علوم پزشکی(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'medical_sciences_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr5 = [
            'chart_title'         => "علوم پزشکی(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'medical_sciences_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr6 = [
            'chart_title'         => "فرهنگیان(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'farhangian_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr7 = [
            'chart_title'         => "فرهنگیان(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'farhangian_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr8 = [
            'chart_title'         => "فنی حرفه ای(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'fani_herfei_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr9 = [
            'chart_title'         => "فنی حرفه ای(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'fani_herfei_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr10 = [
            'chart_title'         => "پیام نور(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'payam_noor_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr11 = [
            'chart_title'         => "پیام نور(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'payam_noor_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr12 = [
            'chart_title'         => "موسسات غیرانتفاعی(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'gheir_entefai_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr13 = [
            'chart_title'         => "موسسات غیرانتفاعی(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'gheir_entefai_percent',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr14 = [
            'chart_title'         => "علمی-کاربردی(تعداد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'elmi_karbordi_count',
            'aggregate_transform' => fn($value) => $value,
        ];
        $chart_arr15 = [
            'chart_title'         => "علمی-کاربردی(درصد)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'elmi_karbordi_percent',
            'aggregate_transform' => fn($value) => $value,
        ];


        $chart = new Lachart($chart_arr, $chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7, $chart_arr8, $chart_arr9, $chart_arr10, $chart_arr11, $chart_arr12, $chart_arr13, $chart_arr14, $chart_arr15);

        return view('components.gostaresh.academic-major-educational.line-chart-all-fields-by-year-component', compact("chart"));
    }
}
