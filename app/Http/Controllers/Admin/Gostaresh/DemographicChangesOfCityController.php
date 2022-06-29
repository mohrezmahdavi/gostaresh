<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\DemographicChangesOfCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Table 1 Controller
class DemographicChangesOfCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demographicChangesOfCities = DemographicChangesOfCity::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.demographic-changes-of-city.list.list', compact('demographicChangesOfCities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.demographic-changes-of-city.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DemographicChangesOfCity::create([
            'user_id' => Auth::user()?->id,
            'country_id' => $request->country_id ?? 1,
            'province_id' => $request->province_id ?? null,
            'county_id' => $request->county_id ?? null,
            'city_id' => $request->city_id ?? null,
            'population' => $request->population ?? 0,
            'immigration_rates' => $request->occupation_rates ?? 0,
            'growth_rate' => $request->growth_rate ?? 0,
            'year' => $request->year ?? null,
            'month' => $request->month ?? null,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DemographicChangesOfCity $demographicChangesOfCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DemographicChangesOfCity $demographicChangesOfCity)
    {
        return view('admin.gostaresh.demographic-changes-of-city.edit.edit', compact('demographicChangesOfCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemographicChangesOfCity $demographicChangesOfCity)
    {
        $demographicChangesOfCity->update([
            'country_id' => $request->country_id ?? 1,
            'province_id' => $request->province_id ?? null,
            'county_id' => $request->county_id ?? null,
            'city_id' => $request->city_id ?? null,
            'population' => $request->population ?? 0,
            'immigration_rates' => $request->occupation_rates ?? 0,
            'growth_rate' => $request->growth_rate ?? 0,
            'year' => $request->year ?? null,
            'month' => $request->month ?? null,
        ]);
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemographicChangesOfCity $demographicChangesOfCity)
    {
        $demographicChangesOfCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
