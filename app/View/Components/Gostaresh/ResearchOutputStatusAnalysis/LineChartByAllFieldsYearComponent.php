<?php

namespace App\View\Components\Gostaresh\ResearchOutputStatusAnalysis;

use App\Models\Index\ResearchOutputStatusAnalysis;
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
        $modelQuery = ResearchOutputStatusAnalysis::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "نمودار برحسب تعداد مقالات معتبر علمی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_valid_scientific_articles',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr1 = [
            'chart_title' => "نمودار برحسب تعداد کتب معتبر",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_valid_books',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr2 = [
            'chart_title' => "نمودار برحسب تعداد کتب تالیفی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_authored_books',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "نمودار برحسب تعداد اختراعات ثبت شده داخلی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_internal_inventions',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title' => "نمودار برحسب تعداد اختراعات ثبت شده بین المللی",
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

        $chart_arr5 = [
            'chart_title' => "نمودار برحسب تعداد پایان نامه ها",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_theses',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title' => "نمودار برحسب تعداد پایان نامه های منجر به مقاله علمی-پژوهشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_research_dissertations',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => "نمودار برحسب تعداد پایان نامه های تدوین شده بر اساس نظام موضوعات برنامه های علمی دانشگاه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_compiled_dissertations',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => "نمودار برحسب تعداد پایان نامه های منجر به ثبت اختراع",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_invented_dissertations',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => "نمودار برحسب تعداد پایان نامه های منجر به محصول",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_product_dissertations',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => "نمودار برحسب تعداد طرح های تحقیقاتی خاتمه یافته",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_completed_research_projects',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr10 = [
            'chart_title' => "نمودار برحسب تعداد کرسی های نظریه پردازی برگزار شده توسط اساتید واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_theorizing_chairs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr11 = [
            'chart_title' => "نمودار برحسب تعداد تفاهمنامه ها با صنایع و سازمان‌های محلی/ملی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_memoranda_of_understanding',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr12 = [
            'chart_title' => "نمودار برحسب مبلغ قراردهای منعقد شده با صنایع و سازمان‌های ملی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount_of_national_contracts_concluded',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr13 = [
            'chart_title' => "نمودار برحسب مبلغ قراردهای منعقد شده با صنایع و سازمان‌های محلی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount_of_local_contracts_concluded',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr14 = [
            'chart_title' => "نمودار برحسب تعداد مجلات علمی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_scientific_journals',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr15 = [
            'chart_title' => "نمودار برحسب تعداد پژوهش های معطوف به R &D",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_R&D_research',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr16 = [
            'chart_title' => "نمودار برحسب تعداد طرح ها و ایده های فناورانه و نوآورانه تجاری سازی شده",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'number_of_innovative_ideas',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr, $chart_arr1, $chart_arr2, $chart_arr3, $chart_arr4, $chart_arr5, $chart_arr6, $chart_arr7, $chart_arr8, $chart_arr9, $chart_arr10, $chart_arr11, $chart_arr12, $chart_arr13, $chart_arr14, $chart_arr15, $chart_arr16);
        return view('components.gostaresh.research-output-status-analysis.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
