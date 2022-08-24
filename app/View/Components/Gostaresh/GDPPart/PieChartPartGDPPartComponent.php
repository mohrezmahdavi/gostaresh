<?php

namespace App\View\Components\Gostaresh\GDPPart;

use App\Models\Index\GDPPart;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartPartGDPPartComponent extends Component
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
        $gdpParts = GDPPart::select('part', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('part')->get();

        return view('components.gostaresh.g-d-p-part.pie-chart-part-g-d-p-part-component', compact('gdpParts'));
    }
}
