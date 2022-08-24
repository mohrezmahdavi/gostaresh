<?php

namespace App\View\Components\Gostaresh\UnemploymentRate;

use App\Models\Index\UnemploymentRate;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartEducationIdUnemploymentRateComponent extends Component
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
        $unemploymentRates = UnemploymentRate::select('education_id', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('education_id')->get();

        return view('components.gostaresh.unemployment-rate.pie-chart-education-id-unemployment-rate-component', compact('unemploymentRates'));
    }
}
