<?php

namespace App\View\Components\Gostaresh\StatusAnalysisOfTheNumberOfFieldsOfStudy;

use App\Models\Index\StatusAnalysisOfTheNumberOfFieldsOfStudy;
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
        $modelQuery = StatusAnalysisOfTheNumberOfFieldsOfStudy::whereRequestsQuery();

        $chart_arr1 = [
            'chart_title'         => "تعداد کل رشته های تحصیلی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'total_number_of_fields_of_study',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr2 = [
            'chart_title'         => "تعداد رشته های تحصیلی بین المللی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_international_courses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr3 = [
            'chart_title'         => "تعداد رشته های تحصیلی مجازی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_virtual_courses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr4 = [
            'chart_title'         => "تعداد رشته های فنی و حرفه ای و مهارتی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_technical_disciplines',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr5 = [
            'chart_title'         => "تعداد رشته های تحصیلی جدید التاسیس",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_newly_established_courses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr6 = [
            'chart_title'         => "تعداد رشته / محل های فاقد پذیرش",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_courses_not_accepted',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr7 = [
            'chart_title'         => "تعداد رشته / محل های فاقد داوطلب",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_courses_without_volunteers',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr8 = [
            'chart_title'         => "تعدادرشته های تحصیلی مرتبط با حوزه GDP غالب استان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_GDP_courses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr9 = [
            'chart_title'         => "تعداد رشته های تحصیلی منطبق با حوزه های شغلی مورد نیاز در شهرستان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_disciplines_corresponding_to_job_fields',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr10 = [
            'chart_title'         => "تعداد رشته های تحصیلی منطبق با تخصص های تعیین شده برای شهرستان",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_fields_corresponding_to_the_specified_specialties',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr11 = [
            'chart_title'         => "تعداد واحدهای درسی ارایه شده به صورت مجازی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_courses_offered_virtually',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr12 = [
            'chart_title'         => "تعداد رشته های تحصیلی پر مخاطب (با تعداد کل دانشجوی بیش از 80 درصد ظرفیت)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_popular_fields_more_than_eighty_percent_capacity',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr13 = [
            'chart_title'         => "تعداد رشته های تحصیلی کم مخاطب (با تعداد کل دانشجوی کمتر از 20 درصد ظرفیت)",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_courses_with_low_audience',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr14 = [
            'chart_title'         => "تعداد رشته های تحصیلی کمتر از 5 نفر",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_fields_of_less_than_5_people',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr15 = [
            'chart_title'         => "تعداد رشته های تحصیلی بدون پذیرش",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_courses_without_admission',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr16 = [
            'chart_title'         => "تعداد رشته های تحصیلی پر متقاضی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'number_of_popular_fields',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        $chart_arr17 = [
            'chart_title'         => "تعداد رشته های تحصیلی کم متقاضی",
            'report_type'         => 'group_by_string',
            'model'               => $modelQuery,
            'group_by_field'      => 'year',
            'chart_type'          => 'line',
            'aggregate_function'  => 'sum',
            'aggregate_field'     => 'low_number_of_applicants',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7, $chart_arr8, $chart_arr9, $chart_arr10, $chart_arr11, $chart_arr12, $chart_arr13, $chart_arr14, $chart_arr15, $chart_arr16, $chart_arr17);

        return view('components.gostaresh.status-analysis-of-the-number-of-fields-of-study.line-chart-all-fields-by-year-component', compact("chart"));

    }
}
