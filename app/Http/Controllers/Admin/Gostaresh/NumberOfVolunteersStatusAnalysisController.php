<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfVolunteersStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberOfVolunteersStatusAnalysis\NumberOfVolunteersStatusAnalysisRequest;
use App\Models\Index\NumberOfVolunteersStatusAnalysis;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 18 Controller
class NumberOfVolunteersStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-NumberOfVolunteersStatusAnalysis");

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
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-NumberOfVolunteersStatusAnalysis");

        return view('admin.gostaresh.number-of-volunteers-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberOfVolunteersStatusAnalysisRequest $request
     * @return Response
     */
    public function store(NumberOfVolunteersStatusAnalysisRequest $request)
    {
        $this->authorize("create-any-NumberOfVolunteersStatusAnalysis");

        NumberOfVolunteersStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $this->authorize("edit-any-NumberOfVolunteersStatusAnalysis");

        return view(
            'admin.gostaresh.number-of-volunteers-status-analysis.edit.edit', compact('numberOfVolunteersStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberOfVolunteersStatusAnalysisRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NumberOfVolunteersStatusAnalysisRequest $request, NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $this->authorize("edit-any-NumberOfVolunteersStatusAnalysis");
        $numberOfVolunteersStatusAnalysis->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $this->authorize("delete-any-NumberOfVolunteersStatusAnalysis");
        $numberOfVolunteersStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
