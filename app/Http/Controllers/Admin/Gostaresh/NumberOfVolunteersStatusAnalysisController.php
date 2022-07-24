<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfVolunteersStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfVolunteersStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfVolunteersStatusAnalysis\NumberOfVolunteersStatusAnalysisRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 18 Controller
class NumberOfVolunteersStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfVolunteersStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfVolunteersStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfVolunteersStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-volunteers-status-analysis.list.list', compact('numberOfVolunteersStatusAnalyses', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfVolunteersStatusAnalysisRecords()
    {
        return NumberOfVolunteersStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfVolunteersStatusAnalyses = $this->getNumberOfVolunteersStatusAnalysisRecords();
        return Excel::download(new ListExport($numberOfVolunteersStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberOfVolunteersStatusAnalyses = $this->getNumberOfVolunteersStatusAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-volunteers-status-analysis.list.pdf', compact('numberOfVolunteersStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberOfVolunteersStatusAnalyses = $this->getNumberOfVolunteersStatusAnalysisRecords();
        return view('admin.gostaresh.number-of-volunteers-status-analysis.list.pdf', compact('numberOfVolunteersStatusAnalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-volunteers-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfVolunteersStatusAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfVolunteersStatusAnalysisRequest $request)
    {
        NumberOfVolunteersStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        return view('admin.gostaresh.number-of-volunteers-status-analysis.edit.edit', compact('numberOfVolunteersStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfVolunteersStatusAnalysisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfVolunteersStatusAnalysisRequest $request, NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $numberOfVolunteersStatusAnalysis->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $numberOfVolunteersStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
