<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\GrowthRateStudentPopulation\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\GrowthRateStudentPopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\GrowthRateStudentPopulation\GrowthRateStudentPopulationRequest;
use Maatwebsite\Excel\Facades\Excel;

// Table 4 Controller
class GrowthRateStudentPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = GrowthRateStudentPopulation::whereRequestsQuery();
        $growthRateStudentPopulations = $query->orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.growth-rate-student-population.list.list', compact('growthRateStudentPopulations'));
    }

    // private function getGrowthRateStudentPopulationsQuery()
    // {
    //     $query = GrowthRateStudentPopulation::query();
    //     $query = filterByOwnProvince($query);
    //     return $query;
    // }

    public function listExcelExport()
    {
        $query = GrowthRateStudentPopulation::whereRequestsQuery();
        $growthRateStudentPopulations = $query->orderBy('id', 'desc')->get();
        return Excel::download(new ListExport($growthRateStudentPopulations), 'invoices.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.growth-rate-student-population.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GrowthRateStudentPopulationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrowthRateStudentPopulationRequest $request)
    {
        GrowthRateStudentPopulation::create(array_merge(['user_id' => Auth::id()] , $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        return view('admin.gostaresh.growth-rate-student-population.edit.edit', compact('growthRateStudentPopulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GrowthRateStudentPopulationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GrowthRateStudentPopulationRequest $request, GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        $growthRateStudentPopulation->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        $growthRateStudentPopulation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
