<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\ResearchOutputStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\ResearchOutputStatusAnalysis\ResearchOutputStatusAnalysisRequest;
use App\Models\Index\ResearchOutputStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 35 Controller
class ResearchOutputStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $this->authorize("view-any-ResearchOutputStatusAnalysis");
        $query = ResearchOutputStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = ResearchOutputStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $researchOutputStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.research-output-status-analyses.list.list', compact('researchOutputStatusAnalyses',
            'yearSelectedList', 'filterColumnsCheckBoxes'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getResearchOutputStatusAnalysesRecords()
    {
        return ResearchOutputStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $researchOutputStatusAnalyses = $this->getResearchOutputStatusAnalysesRecords();
        return Excel::download(new ListExport($researchOutputStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $researchOutputStatusAnalyses = $this->getResearchOutputStatusAnalysesRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.research-output-status-analyses.list.pdf', compact('researchOutputStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $researchOutputStatusAnalyses = $this->getResearchOutputStatusAnalysesRecords();
        return view('admin.gostaresh.research-output-status-analyses.list.pdf', compact('researchOutputStatusAnalyses'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $this->authorize("create-any-ResearchOutputStatusAnalysis");

        return view(
            'admin.gostaresh.research-output-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ResearchOutputStatusAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(ResearchOutputStatusAnalysisRequest $request): RedirectResponse
    {
        $this->authorize("create-any-ResearchOutputStatusAnalysis");
        ResearchOutputStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param ResearchOutputStatusAnalysis $ResearchOutputStatusAnalysis
     * @return void
     */
    public function show(ResearchOutputStatusAnalysis $ResearchOutputStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return Application|Factory|View
     */
    public function edit(ResearchOutputStatusAnalysis $researchOutputStatusAnalysis): Factory|View|Application
    {
        $this->authorize("edit-any-ResearchOutputStatusAnalysis");

        return view(
            'admin.gostaresh.research-output-status-analyses.edit.edit', compact('researchOutputStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ResearchOutputStatusAnalysisRequest $request
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return RedirectResponse
     */
    public function update(ResearchOutputStatusAnalysisRequest $request, ResearchOutputStatusAnalysis $researchOutputStatusAnalysis): RedirectResponse
    {
        $this->authorize("edit-any-ResearchOutputStatusAnalysis");
        $researchOutputStatusAnalysis->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return RedirectResponse
     */
    public function destroy(ResearchOutputStatusAnalysis $researchOutputStatusAnalysis): RedirectResponse
    {
        $this->authorize("delete-any-ResearchOutputStatusAnalysis");
        $researchOutputStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
