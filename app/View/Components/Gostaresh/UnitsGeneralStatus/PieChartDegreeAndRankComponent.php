<?php

namespace App\View\Components\Gostaresh\UnitsGeneralStatus;

use App\Models\Index\UnitsGeneralStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartDegreeAndRankComponent extends Component
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
        $unitsGeneralStatuses = UnitsGeneralStatus::select('degree/rank', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('degree/rank')->get();

        return view('components.gostaresh.units-general-status.pie-chart-degree-and-rank-component', compact('unitsGeneralStatuses'));

    }
}
