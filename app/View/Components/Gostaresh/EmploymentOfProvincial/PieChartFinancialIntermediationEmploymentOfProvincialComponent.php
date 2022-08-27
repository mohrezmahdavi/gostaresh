<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartFinancialIntermediationEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('financial_intermediation', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('financial_intermediation')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-financial-intermediation-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
