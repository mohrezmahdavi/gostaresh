<?php

namespace App\View\Components\Gostaresh\PercapitaRevenue;

use App\Models\Index\PercapitaRevenueStatusAnalysis;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartUniversityTypeComponent extends Component
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
        $percapitaRevenue = PercapitaRevenueStatusAnalysis::select('university_type', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('university_type')->get();

        return view('components.gostaresh.percapita-revenue.pie-chart-university-type-component', compact('percapitaRevenue'));
    }
}
