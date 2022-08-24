<?php

namespace App\View\Components\Gostaresh\GeographicalLocationOfUnit;

use App\Models\Index\GeographicalLocationOfUnit;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartClimateTypeAndWeatherConditionsGeographicalLocationComponent extends Component
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
        $geographicalLocationOfUnits = GeographicalLocationOfUnit::select('climate_type_and_weather_conditions', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('climate_type_and_weather_conditions')->get();

        return view('components.gostaresh.geographical-location-of-unit.pie-chart-climate-type-and-weather-conditions-geographical-location-component', compact('geographicalLocationOfUnits'));
    }
}
