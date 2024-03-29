<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\RevenueStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\RevenueStatusAnalysis\RevenueStatusAnalysisRequest;
use App\Models\Index\RevenueStatusAnalysis;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 48 Controller
class RevenueStatusAnalysesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-RevenueStatusAnalysis");

        $query = RevenueStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = RevenueStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $revenueStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.revenue-status-analyses.list.list', compact('revenueStatusAnalyses'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getRevenueStatusAnalysisRecords()
    {
        return RevenueStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $revenueStatusAnalyses = $this->getRevenueStatusAnalysisRecords();
        return Excel::download(new ListExport($revenueStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $revenueStatusAnalyses = $this->getRevenueStatusAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.revenue-status-analyses.list.pdf', compact('revenueStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $revenueStatusAnalyses = $this->getRevenueStatusAnalysisRecords();
        return view('admin.gostaresh.revenue-status-analyses.list.pdf', compact('revenueStatusAnalyses'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-RevenueStatusAnalysis");

        return view('admin.gostaresh.revenue-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RevenueStatusAnalysisRequest $request
     * @return Response
     */
    public function store(RevenueStatusAnalysisRequest $request)
    {
        $this->authorize("create-any-RevenueStatusAnalysis");

        RevenueStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return void
     */
    public function show(RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return Response
     */
    public function edit(RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        $this->authorize("edit-any-RevenueStatusAnalysis");

        return view(
            'admin.gostaresh.revenue-status-analyses.edit.edit', compact('revenueStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RevenueStatusAnalysisRequest $request
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return Response
     */
    public function update(RevenueStatusAnalysisRequest $request, RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        $this->authorize("edit-any-RevenueStatusAnalysis");

        $revenueStatusAnalysis->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return Response
     */
    public function destroy(RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        $this->authorize("delete-any-RevenueStatusAnalysis");

        $revenueStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
