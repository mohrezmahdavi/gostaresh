<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartOverseasOrganizationsAndDelegationsEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('overseas_organizations_and_delegations', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('overseas_organizations_and_delegations')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-overseas-organizations-and-delegations-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
