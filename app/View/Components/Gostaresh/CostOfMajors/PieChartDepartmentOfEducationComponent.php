<?php

namespace App\View\Components\gostaresh\CostOfMajors;

use App\Models\Index\AverageCostOfMajor;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartDepartmentOfEducationComponent extends Component
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
        $costOfMajors = AverageCostOfMajor::select('department_of_education', DB::raw('sum(associate_degree+bachelor_degree+masters+professional_phd+phd) as total'))
            ->whereRequestsQuery()
            ->groupBy('department_of_education')->get();

        return view('components.gostaresh.cost-of-majors.pie-chart-department-of-education-component', compact('costOfMajors'));
    }
}
