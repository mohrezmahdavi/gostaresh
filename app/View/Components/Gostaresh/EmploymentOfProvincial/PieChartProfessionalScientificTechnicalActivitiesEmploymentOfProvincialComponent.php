<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartProfessionalScientificTechnicalActivitiesEmploymentOfProvincialComponent extends Component
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
        $employmentOfProvincials = EmploymentOfProvincial::select('professional_scientific_technical_activities', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('professional_scientific_technical_activities')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-professional-scientific-technical-activities-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
