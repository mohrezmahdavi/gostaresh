<?php

namespace App\View\Components\Gostaresh\GeographicalLocationOfUnit;

use App\Models\Index\GeographicalLocationOfUnit;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartInternationalOpportunitiesGeographicalLocationComponent extends Component
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
        $geographicalLocationOfUnits = GeographicalLocationOfUnit::select('international_opportunities_geographical_location', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('international_opportunities_geographical_location')->get();

        return view('components.gostaresh.geographical-location-of-unit.pie-chart-international-opportunities-geographical-location-component', compact('geographicalLocationOfUnits'));
    }
}
