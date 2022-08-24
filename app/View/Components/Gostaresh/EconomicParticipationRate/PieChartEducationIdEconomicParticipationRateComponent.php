<?php

namespace App\View\Components\Gostaresh\EconomicParticipationRate;

use App\Models\Index\EconomicParticipationRate;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartEducationIdEconomicParticipationRateComponent extends Component
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
        $economicParticipationRates = EconomicParticipationRate::select('education_id', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('education_id')->get();

        return view('components.gostaresh.economic-participation-rate.pie-chart-education-id-economic-participation-rate-component', compact('economicParticipationRates'));
    }
}
