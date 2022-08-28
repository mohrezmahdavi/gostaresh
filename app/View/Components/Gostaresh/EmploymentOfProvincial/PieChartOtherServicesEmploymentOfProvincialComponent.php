<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartOtherServicesEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('other_services', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('other_services')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-other-services-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
