<?php

namespace App\View\Components\Gostaresh\PercapitaRevenue;

use App\Models\Index\PercapitaRevenueStatusAnalysis;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartGradeComponent extends Component
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
        $percapitaRevenue = PercapitaRevenueStatusAnalysis::select('grade_id', DB::raw('sum(percapita_revenue_status_analyses) as total'))->whereRequestsQuery()->groupBy('grade_id')->get();

        return view('components.gostaresh.percapita-revenue.pie-chart-grade-component', compact('percapitaRevenue'));
    }
}
