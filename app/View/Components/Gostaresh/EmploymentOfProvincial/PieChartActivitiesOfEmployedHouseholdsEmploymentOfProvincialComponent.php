<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartActivitiesOfEmployedHouseholdsEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('activities_of_employed_households', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('activities_of_employed_households')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-activities-of-employed-households-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
