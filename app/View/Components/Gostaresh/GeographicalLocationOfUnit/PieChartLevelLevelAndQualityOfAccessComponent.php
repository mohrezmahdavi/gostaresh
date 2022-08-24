<?php

namespace App\View\Components\Gostaresh\GeographicalLocationOfUnit;

use App\Models\Index\GeographicalLocationOfUnit;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartLevelLevelAndQualityOfAccessComponent extends Component
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
        $geographicalLocationOfUnits = GeographicalLocationOfUnit::select('level_and_quality_of_access', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('level_and_quality_of_access')->get();

        return view('components.gostaresh.geographical-location-of-unit.pie-chart-level-level-and-quality-of-access-component', compact('geographicalLocationOfUnits'));
    }
}
