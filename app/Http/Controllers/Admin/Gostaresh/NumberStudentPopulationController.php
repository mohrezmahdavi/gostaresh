<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberStudentPopulation\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\NumberStudentPopulation;
use Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberStudentPopulation\NumberStudentPopulationRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

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
        $query = NumberStudentPopulation::whereRequestsQuery();
        $numberStudentPopulations = $query->orderBy('id', 'DESC')->paginate(20);
        return view('admin.gostaresh.number-student-population.list.list', compact('numberStudentPopulations'));
    }

    private function getNumberStudentPopulationRecords()
    {
        return NumberStudentPopulation::whereRequestsQuery()->orderBy('id', 'DESC')->get();
    }


    public function listExcelExport()
    {
        $numberStudentPopulations = $this->getNumberStudentPopulationRecords();
        return Excel::download(new ListExport($numberStudentPopulations), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberStudentPopulations = $this->getNumberStudentPopulationRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-student-population.list.pdf', compact('numberStudentPopulations'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberStudentPopulations = $this->getNumberStudentPopulationRecords();
        return view('admin.gostaresh.number-student-population.list.pdf', compact('numberStudentPopulations'));
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
     * @param  NumberStudentPopulationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberStudentPopulationRequest $request)
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
     * @param  NumberStudentPopulationRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberStudentPopulationRequest $request, NumberStudentPopulation $numberStudentPopulation)
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
