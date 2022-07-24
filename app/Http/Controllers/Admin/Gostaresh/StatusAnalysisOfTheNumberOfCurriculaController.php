<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\StatusAnalysisOfTheNumberOfCurricula\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\StatusAnalysisOfTheNumberOfCurricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class StatusAnalysisOfTheNumberOfCurriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = StatusAnalysisOfTheNumberOfCurricula::WhereRequestsQuery();

        $filterColumnsCheckBoxes = StatusAnalysisOfTheNumberOfCurricula::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $statusAnalysisOfTheNumberOfCurriculas = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.list.list', compact('statusAnalysisOfTheNumberOfCurriculas', 'yearSelectedList', 'filterColumnsCheckBoxes'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getStatusAnalysisOfTheNumberOfCurriculaRecords()
    {
        return StatusAnalysisOfTheNumberOfCurricula::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $statusAnalysisOfTheNumberOfCurriculas = $this->getStatusAnalysisOfTheNumberOfCurriculaRecords();
        return Excel::download(new ListExport($statusAnalysisOfTheNumberOfCurriculas), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $statusAnalysisOfTheNumberOfCurriculas = $this->getStatusAnalysisOfTheNumberOfCurriculaRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.status-analysis-of-the-number-of-curricula.list.pdf', compact('statusAnalysisOfTheNumberOfCurriculas'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $statusAnalysisOfTheNumberOfCurriculas = $this->getStatusAnalysisOfTheNumberOfCurriculaRecords();
        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.list.pdf', compact('statusAnalysisOfTheNumberOfCurriculas'));
    }
    // ****************** End Export ******************


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StatusAnalysisOfTheNumberOfCurricula::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.edit.edit', compact('stsAnalysisOfTheNumOfCurricula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        $stsAnalysisOfTheNumOfCurricula->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        $stsAnalysisOfTheNumOfCurricula->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
