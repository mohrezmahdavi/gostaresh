<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\InternationalResearchStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InternationalResearchStatusAnalysis\InternationalResearchStatusAnalysisRequest;
use App\Models\Index\InternationalResearchStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 36 Controller
class InternationalResearchStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $this->authorize("view-any-InternationalResearchStatusAnalysis");
        $query = InternationalResearchStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = InternationalResearchStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $internationalResearchStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.international-research-status-analyses.list.list', compact(
            'internationalResearchStatusAnalyses', "filterColumnsCheckBoxes", "yearSelectedList"));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getInternationalResearchStatusAnalysesRecords()
    {
        return InternationalResearchStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $internationalResearchStatusAnalyses = $this->getInternationalResearchStatusAnalysesRecords();
        return Excel::download(new ListExport($internationalResearchStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $internationalResearchStatusAnalyses = $this->getInternationalResearchStatusAnalysesRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.international-research-status-analyses.list.pdf', compact('internationalResearchStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $internationalResearchStatusAnalyses = $this->getInternationalResearchStatusAnalysesRecords();
        return view('admin.gostaresh.international-research-status-analyses.list.pdf', compact('internationalResearchStatusAnalyses'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $this->authorize("create-any-InternationalResearchStatusAnalysis");

        return view(
            'admin.gostaresh.international-research-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InternationalResearchStatusAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(InternationalResearchStatusAnalysisRequest $request): RedirectResponse
    {
        $this->authorize("create-any-InternationalResearchStatusAnalysis");
        InternationalResearchStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearchStatusAnalysis
     * @return void
     */
    public function show(InternationalResearchStatusAnalysis $internationalResearchStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return Application|Factory|View
     */
    public function edit(InternationalResearchStatusAnalysis $internationalResearch): Factory|View|Application
    {
        $this->authorize("edit-any-InternationalResearchStatusAnalysis");

        return view(
            'admin.gostaresh.international-research-status-analyses.edit.edit', compact('internationalResearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InternationalResearchStatusAnalysisRequest $request
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return RedirectResponse
     */
    public function update(InternationalResearchStatusAnalysisRequest $request, InternationalResearchStatusAnalysis $internationalResearch): RedirectResponse
    {
        $this->authorize("edit-any-InternationalResearchStatusAnalysis");
        $internationalResearch->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return RedirectResponse
     */
    public function destroy(InternationalResearchStatusAnalysis $internationalResearch): RedirectResponse
    {
        $this->authorize("delete-any-InternationalResearchStatusAnalysis");
        $internationalResearch->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
