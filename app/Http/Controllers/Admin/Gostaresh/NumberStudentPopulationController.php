<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberStudentPopulation\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\NumberStudentPopulation;
use Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

// Table 3 Controller
class NumberStudentPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = $this->getNumberStudentPopulationsQuery();
        $numberStudentPopulations = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.gostaresh.number-student-population.list.list', compact('numberStudentPopulations'));
    }

    private function getNumberStudentPopulationsQuery()
    {
        $query = NumberStudentPopulation::query();
        if (request()->province_id) {
            $query->where('province_id', request()->province_id);
        }

        if (request()->county_id) {
            $query->where('county_id', request()->county_id);
        }

        if (request()->city_id) {
            $query->where('city_id', request()->city_id);
        }

        if (request()->rural_district_id) {
            $query->where('rural_district_id', request()->rural_district_id);
        }

        if (request()->input('start_date')) {
            $startDateJ = Verta::instance(request()->input('start_date'));
            $startMonth = (int)$startDateJ->format('n');
            $startYear = (int)$startDateJ->format('Y');
            $query->where('year', '>', $startYear)->orWhere(function ($query) use ($startYear, $startMonth) {
                $query->where('year', $startYear)->where('month', '>', $startMonth);
            });
        }

        if (request()->input('end_date')) {
            $endDateJ = Verta::instance(request()->input('end_date'));
            $endMonth = (int)$endDateJ->format('n');
            $endYear = (int)$endDateJ->format('Y');
            $query->where('year', '<=', $endYear)->orWhere(function ($query) use ($endYear, $endMonth) {
                $query->where('year', $endYear)->where('month', '<=', $endMonth);
            });
        }
        return $query;
    }

    public function listExcelExport()
    {
        $query = $this->getNumberStudentPopulationsQuery();
        $numberStudentPopulations = $query->orderBy('id', 'DESC')->get();
        return Excel::download(new ListExport($numberStudentPopulations), 'invoices.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-student-population.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberStudentPopulation::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberStudentPopulation $numberStudentPopulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberStudentPopulation $numberStudentPopulation)
    {
        return view('admin.gostaresh.number-student-population.edit.edit', compact('numberStudentPopulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberStudentPopulation $numberStudentPopulation)
    {
        $numberStudentPopulation->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberStudentPopulation $numberStudentPopulation)
    {
        $numberStudentPopulation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
