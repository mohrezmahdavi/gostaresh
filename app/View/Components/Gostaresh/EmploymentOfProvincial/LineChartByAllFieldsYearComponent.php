<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
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
        $modelQuery = EmploymentOfProvincial::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "نمودار برحسب کشاورزی، شکار و جنگلداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'agriculture_hunting_forestry',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr1 = [
            'chart_title' => "نمودار برحسب استخراج معدن - ساخت",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'mining_construction',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr2 = [
            'chart_title' => "نمودار برحسب تامین آب، برق و گاز طبیعی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'water_electricity_natural_gas_supply',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr3 = [
            'chart_title' => "نمودار برحسب ساختمان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'building',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr4 = [
            'chart_title' => "نمودار برحسب عمده فروشی، خرده فروشی، تعمیر وسایل نقلیه و تامین کالا",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'wholesale_retail_vehicle_repair_supply',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr5 = [
            'chart_title' => "نمودار برحسب هتل و رسنوران",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'hotel_and_restaurant',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr6 = [
            'chart_title' => "نمودار برحسب حمل و نقل، انبارداری و ارتباطات",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'transportation_warehousing_communications',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr7 = [
            'chart_title' => "نمودار برحسب واسطه گری های مالی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'financial_intermediation',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr8 = [
            'chart_title' => "نمودار برحسب اداره امور عمومی و خدمات شهری، دفاع، و تامین اجتماعی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'office_of_public_affairs_urban_services',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr9 = [
            'chart_title' => "نمودار برحسب آموزش",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'education',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr10 = [
            'chart_title' => "نمودار برحسب بهداشت و مددکاری اجتماعی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'health_and_social_work',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr11 = [
            'chart_title' => "نمودار برحسب فعالیت های خانوارهای دارای مستخدم",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'activities_of_employed_households',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr12 = [
            'chart_title' => "نمودار برحسب سازمان ها و هیات های برون مرزی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'overseas_organizations_and_delegations',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr13 = [
            'chart_title' => "نمودار برحسب املاک و مستغلات",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'real_estates',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr14 = [
            'chart_title' => "نمودار برحسب فعالیت های حرفه ای ، علمی و فنی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'professional_scientific_technical_activities',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr15 = [
            'chart_title' => "نمودار برحسب اداری و خدمات پشتیبانی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'office_and_support_services',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr16 = [
            'chart_title' => "نمودار برحسب هنر و سرگرمی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'art_and_entertainment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart_arr17 = [
            'chart_title' => "نمودار سایر خدمات",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'other_services',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4,$chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8,$chart_arr9,$chart_arr10,$chart_arr11,$chart_arr12,$chart_arr13,$chart_arr14,$chart_arr15,$chart_arr16,$chart_arr17);
        return view('components.gostaresh.employment-of-provincial.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
