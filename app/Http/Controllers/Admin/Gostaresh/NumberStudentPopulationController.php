<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberStudentPopulation\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberStudentPopulation\NumberStudentPopulationRequest;
use App\Models\Index\NumberStudentPopulation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 3 Controller
class NumberStudentPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-NumberStudentPopulation");

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
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-NumberStudentPopulation");

        return view('admin.gostaresh.number-student-population.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberStudentPopulationRequest $request
     * @return Response
     */
    public function store(NumberStudentPopulationRequest $request)
    {
        $this->authorize("create-any-NumberStudentPopulation");

        NumberStudentPopulation::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(NumberStudentPopulation $numberStudentPopulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(NumberStudentPopulation $numberStudentPopulation)
    {
        $this->authorize("edit-any-NumberStudentPopulation");

        return view(
            'admin.gostaresh.number-student-population.edit.edit', compact('numberStudentPopulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberStudentPopulationRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NumberStudentPopulationRequest $request, NumberStudentPopulation $numberStudentPopulation)
    {
        $this->authorize("edit-any-NumberStudentPopulation");
        $numberStudentPopulation->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(NumberStudentPopulation $numberStudentPopulation)
    {
        $this->authorize("delete-any-NumberStudentPopulation");
        $numberStudentPopulation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
