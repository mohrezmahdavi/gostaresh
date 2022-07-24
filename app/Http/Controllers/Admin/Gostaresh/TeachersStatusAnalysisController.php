<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\TeachersStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\TeachersStatusAnalysis\TeachersStatusAnalysisRequest;
use App\Models\Index\GraduateStatusAnalysis;
use App\Models\Index\TeachersStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 34 Controller
class TeachersStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $query = TeachersStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = TeachersStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $teachersStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.teachers-status-analyses.list.list', compact('teachersStatusAnalyses',
            'yearSelectedList', 'filterColumnsCheckBoxes'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getTeachersStatusAnalysesRecords()
    {
        return TeachersStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $teachersStatusAnalyses = $this->getTeachersStatusAnalysesRecords();
        return Excel::download(new ListExport($teachersStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $teachersStatusAnalyses = $this->getTeachersStatusAnalysesRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.teachers-status-analyses.list.pdf', compact('teachersStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $teachersStatusAnalyses = $this->getTeachersStatusAnalysesRecords();
        return view('admin.gostaresh.teachers-status-analyses.list.pdf', compact('teachersStatusAnalyses'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gostaresh.teachers-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeachersStatusAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(TeachersStatusAnalysisRequest $request): RedirectResponse
    {
        TeachersStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return void
     */
    public function show(TeachersStatusAnalysis $teachersStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return Application|Factory|View
     */
    public function edit(TeachersStatusAnalysis $teachersStatusAnalysis): Factory|View|Application
    {
        return view('admin.gostaresh.teachers-status-analyses.edit.edit', compact('teachersStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeachersStatusAnalysisRequest $request
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return RedirectResponse
     */
    public function update(TeachersStatusAnalysisRequest $request, TeachersStatusAnalysis $teachersStatusAnalysis): RedirectResponse
    {
        $teachersStatusAnalysis->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return RedirectResponse
     */
    public function destroy(TeachersStatusAnalysis $teachersStatusAnalysis): RedirectResponse
    {
        $teachersStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
