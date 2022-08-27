<?php

namespace App\View\Components\Gostaresh\EmploymentOfProvincial;

use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class PieChartHotelAndRestaurantEmploymentOfProvincialComponent extends Component
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
     * Get the view / contents that represent the component. hotel_and_restaurant
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $employmentOfProvincials = EmploymentOfProvincial::select('hotel_and_restaurant', DB::raw('count(*) as total'))->whereRequestsQuery()->groupBy('hotel_and_restaurant')->get();

        return view('components.gostaresh.employment-of-provincial.pie-chart-hotel-and-restaurant-employment-of-provincial-component', compact('employmentOfProvincials'));
    }
}
