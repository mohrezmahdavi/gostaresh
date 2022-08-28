<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartOfficeAndSupportServicesEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('office_and_support_services', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('office_and_support_services')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-office-and-support-services-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
