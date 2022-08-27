<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartHealthAndSocialWorkEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('health_and_social_work', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('health_and_social_work')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-health-and-social-work-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
