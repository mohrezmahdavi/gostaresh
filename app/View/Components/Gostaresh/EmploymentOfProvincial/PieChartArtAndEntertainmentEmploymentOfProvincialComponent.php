<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartArtAndEntertainmentEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('art_and_entertainment', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('art_and_entertainment')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-art-and-entertainment-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
