<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\InternationalResearchStatusAnalysis2\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InternationalResearchStatusAnalysis2\InternationalResearchStatusAnalysis2Request;
use App\Models\Index\InternationalResearchStatusAnalysis2;
use App\Models\Index\ResearchOutputStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 37 Controller
class InternationalResearchStatusAnalysis2Controller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $query = InternationalResearchStatusAnalysis2::whereRequestsQuery();

        $filterColumnsCheckBoxes = InternationalResearchStatusAnalysis2::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $internationalResearchStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.international-research-status-analysis2.list.list', compact(
            'internationalResearchStatusAnalyses', "filterColumnsCheckBoxes", "yearSelectedList"));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getInternationalResearchStatusAnalysesRecords()
    {
        return InternationalResearchStatusAnalysis2::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $internationalResearchStatusAnalyses = $this->getInternationalResearchStatusAnalysesRecords();
        return Excel::download(new ListExport($internationalResearchStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $internationalResearchStatusAnalyses = $this->getInternationalResearchStatusAnalysesRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.international-research-status-analysis2.list.pdf', compact('internationalResearchStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $internationalResearchStatusAnalyses = $this->getInternationalResearchStatusAnalysesRecords();
        return view('admin.gostaresh.international-research-status-analysis2.list.pdf', compact('internationalResearchStatusAnalyses'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.international-research-status-analysis2.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InternationalResearchStatusAnalysis2Request $request
     * @return RedirectResponse
     */
    public function store(InternationalResearchStatusAnalysis2Request $request): RedirectResponse
    {
        InternationalResearchStatusAnalysis2::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param InternationalResearchStatusAnalysis2 $internationalResearchStatusAnalysis2
     * @return void
     */
    public function show(InternationalResearchStatusAnalysis2 $internationalResearchStatusAnalysis2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InternationalResearchStatusAnalysis2 $internationalResearch
     * @return Application|Factory|View
     */
    public function edit(InternationalResearchStatusAnalysis2 $internationalResearch): Factory|View|Application
    {
        return view('admin.gostaresh.international-research-status-analysis2.edit.edit', compact('internationalResearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InternationalResearchStatusAnalysis2Request $request
     * @param InternationalResearchStatusAnalysis2 $internationalResearch
     * @return RedirectResponse
     */
    public function update(InternationalResearchStatusAnalysis2Request $request, InternationalResearchStatusAnalysis2 $internationalResearch): RedirectResponse
    {
        $internationalResearch->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InternationalResearchStatusAnalysis2 $internationalResearch
     * @return RedirectResponse
     */
    public function destroy(InternationalResearchStatusAnalysis2 $internationalResearch): RedirectResponse
    {
        $internationalResearch->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
