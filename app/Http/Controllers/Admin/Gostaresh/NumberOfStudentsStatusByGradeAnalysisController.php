<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfStudentsStatusByGradeAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberOfStudentsStatusByGradeAnalysis\NumberOfStudentsStatusByGradeAnalysisRequest;
use App\Models\Grade;
use App\Models\Index\NumberOfStudentsStatusByGradeAnalysis;
use App\Models\Major;
use App\Models\Minor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 16,17 Controller
class NumberOfStudentsStatusByGradeAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize("view-any-NumberOfStudentsStatusByGradeAnalysis");

        $query = NumberOfStudentsStatusByGradeAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfStudentsStatusByGradeAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfStudentsStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-students-status-by-grade-analysis.list.list', compact(
            'numberOfStudentsStatusAnalyses', 'filterColumnsCheckBoxes', 'yearSelectedList'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfStudentsStatusAnalysisRecords()
    {
        return NumberOfStudentsStatusByGradeAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfStudentsStatusAnalyses = $this->getNumberOfStudentsStatusAnalysisRecords();
        return Excel::download(new ListExport($numberOfStudentsStatusAnalyses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberOfStudentsStatusAnalyses = $this->getNumberOfStudentsStatusAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-students-status-by-grade-analysis.list.pdf', compact('numberOfStudentsStatusAnalyses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberOfStudentsStatusAnalyses = $this->getNumberOfStudentsStatusAnalysisRecords();
        return view('admin.gostaresh.number-of-students-status-by-grade-analysis.list.pdf', compact('numberOfStudentsStatusAnalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize("create-any-NumberOfStudentsStatusByGradeAnalysis");

        $grades = Grade::all();
        $majors = Major::all();
        $minors = Minor::all();
        return view('admin.gostaresh.number-of-students-status-by-grade-analysis.create.create', compact('grades', 'majors', 'minors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberOfStudentsStatusByGradeAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(NumberOfStudentsStatusByGradeAnalysisRequest $request)
    {
        $this->authorize("create-any-NumberOfStudentsStatusByGradeAnalysis");

        NumberOfStudentsStatusByGradeAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis
     * @return Response
     */
    public function show(NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis
     * @return Application|Factory|View
     */
    public function edit(NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis)
    {
        $grades = Grade::all();
        $majors = Major::all();
        $minors = Minor::all();
        return view('admin.gostaresh.number-of-students-status-by-grade-analysis.edit.edit', compact('numberOfStudentsStatusAnalysis', 'minors', 'majors', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberOfStudentsStatusByGradeAnalysisRequest $request
     * @param NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis
     * @return RedirectResponse
     */
    public function update(NumberOfStudentsStatusByGradeAnalysisRequest $request, NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis)
    {
        $this->authorize("edit-any-NumberOfStudentsStatusByGradeAnalysis");
        $numberOfStudentsStatusAnalysis->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis
     * @return RedirectResponse
     */
    public function destroy(NumberOfStudentsStatusByGradeAnalysis $numberOfStudentsStatusAnalysis)
    {
        $this->authorize("delete-any-NumberOfStudentsStatusByGradeAnalysis");
        $numberOfStudentsStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
