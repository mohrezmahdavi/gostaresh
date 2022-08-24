<?php

namespace App\View\Components\Gostaresh\UniversityCosts;

use App\Models\Index\UniversityCostsAnalysis;
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
        $modelQuery = UniversityCostsAnalysis::whereRequestsQuery();

        $charts_arr = [];
        $chart_arr = [
            'chart_title' => "درصد کل پرداختی به اعضای هیات علمی تمام وقت واحد دانشگاهی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'payment_to_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr1 = [
            'chart_title' => "کل هزینه های جاری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_running_costs',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr2 = [
            'chart_title' => "میانگین حقوق دریافتی اعضای هیات علمی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'average_salary_of_faculty_members',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr3 = [
            'chart_title' => "میانگین حقوق دریافتی اعضای هیات علمی دانشگاه آزاد اسلامی استان از محل قراردهای تحقیقاتی، آموزشی و خدماتی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'average_salaries_of_faculty_members_from_research_contracts',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr4 = [
            'chart_title' => "هزینه دانشجویان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'student_fees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr5 = [
            'chart_title' => "میانگین حقوق دریافتی کارمندان",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'average_salary_of_employees',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr6 = [
            'chart_title' => "نرخ رشد هزینه های جاری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'current_expenditure_growth_rate',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr7 = [
            'chart_title' => "هزینه پرداخت اجاره ساختمان اداری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cost_of_paying_office_rent',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr8 = [
            'chart_title' => "هزینه پرداخت اجاره ساختمان آموزشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cost_of_rent_for_educational_building',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr9 = [
            'chart_title' => "هزینه پرداخت اجاره ساختمان پژوهشی",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cost_of_rent_for_research_building',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr10 = [
            'chart_title' => "هزینه پرداخت اجاره ساختمان فوق برنامه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'extra_charge_for_rent_extracurricular_building',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr11 = [
            'chart_title' => "هزینه پرداخت اجاره ساختمان فناوری و نوآوری",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cost_of_rent_innovation_buildings',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr12 = [
            'chart_title' => "هزینه های انرژی ساختمان ها",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'energy_costs_of_buildings',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];
        
        $chart_arr13 = [
            'chart_title' => "هزینه های نگهداری، استهلاک و تعمیرات دارایی ها و تجهیزات دانشگاه",
            'report_type' => 'group_by_string',
            'model' => $modelQuery,
            'group_by_field' => 'year',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'cost_of_university_equipment',
            'aggregate_transform' => function ($value) {
                return $value;
            },
        ];

        $chart = new Lachart($chart_arr,$chart_arr1,$chart_arr2,$chart_arr3,$chart_arr4,$chart_arr5,$chart_arr6,$chart_arr7,$chart_arr8,$chart_arr9,$chart_arr10,$chart_arr11,$chart_arr12,$chart_arr13);
        
        return view('components.gostaresh.university-costs.line-chart-by-all-fields-year-component', compact('chart'));
    }
}
