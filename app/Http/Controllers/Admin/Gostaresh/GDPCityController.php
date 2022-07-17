<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GDPCity\GDPCityRequest;
use App\Models\Index\GDPCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Gostaresh\DemographicChangesOfCity\ListExport;

// Table 5 Controller
class GDPCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = $this->getGDPCityQuery();

        $gdpCities = $query->orderBy('id' , 'desc')->paginate(20);

        return view('admin.gostaresh.gdp-city.list.list', compact('gdpCities'));
    }

    private function getGDPCityQuery()
    {
        $query = GDPCity::query();
        $query = filterByOwnProvince($query);
        return $query;
    }

    public function listExcelExport()
    {
        $query = $this->getGDPCityQuery();
        $gdpCities = $query->orderBy('id' , 'desc')->get();
        return Excel::download(new ListExport($gdpCities), 'invoices.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.gdp-city.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GDPCityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GDPCityRequest $request)
    {
        GDPCity::create(array_merge(['user_id' => Auth::id()] , $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GDPCity $gdpCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GDPCity $gdpCity)
    {
        return view('admin.gostaresh.gdp-city.edit.edit', compact('gdpCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GDPCityRequest $request
     * @param GDPCity $gdpCity
     * @return \Illuminate\Http\Response
     */
    public function update(GDPCityRequest $request, GDPCity $gdpCity)
    {
        $gdpCity->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GDPCity $gdpCity)
    {
        $gdpCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
