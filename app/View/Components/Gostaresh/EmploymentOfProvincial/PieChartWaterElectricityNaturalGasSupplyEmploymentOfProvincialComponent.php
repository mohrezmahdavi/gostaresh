<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartWaterElectricityNaturalGasSupplyEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('water_electricity_natural_gas_supply', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('water_electricity_natural_gas_supply')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-water-electricity-natural-gas-supply-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
