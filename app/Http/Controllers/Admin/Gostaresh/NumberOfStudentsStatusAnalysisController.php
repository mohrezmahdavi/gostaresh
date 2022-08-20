<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfStudentsStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberOfStudentsStatusAnalysis\NumberOfStudentsStatusAnalysisRequest;
use App\Models\Grade;
use App\Models\Index\NumberOfStudentsStatusAnalysis;
use App\Models\Major;
use App\Models\Minor;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 16,17 Controller
class NumberOfStudentsStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-NumberOfStudentsStatusAnalysis");

        $query = NumberOfStudentsStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfStudentsStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfStudentsStatusAnalysises = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-students-status-analysis.list.list', compact('numberOfStudentsStatusAnalysises', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfStudentsStatusAnalysisRecords()
    {
        return NumberOfStudentsStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfStudentsStatusAnalysises = $this->getNumberOfStudentsStatusAnalysisRecords();
        return Excel::download(new ListExport($numberOfStudentsStatusAnalysises), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberOfStudentsStatusAnalysises = $this->getNumberOfStudentsStatusAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-students-status-analysis.list.pdf', compact('numberOfStudentsStatusAnalysises'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberOfStudentsStatusAnalysises = $this->getNumberOfStudentsStatusAnalysisRecords();
        return view('admin.gostaresh.number-of-students-status-analysis.list.pdf', compact('numberOfStudentsStatusAnalysises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-NumberOfStudentsStatusAnalysis");

        $grades = Grade::all();
        $majors = Major::all();
        $minors = Minor::all();
        return view('admin.gostaresh.number-of-students-status-analysis.create.create', compact('grades', 'majors', 'minors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberOfStudentsStatusAnalysisRequest $request
     * @return Response
     */
    public function store(NumberOfStudentsStatusAnalysisRequest $request)
    {
        $this->authorize("create-any-NumberOfStudentsStatusAnalysis");

        NumberOfStudentsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        $grades = Grade::all();
        $majors = Major::all();
        $minors = Minor::all();
        return view('admin.gostaresh.number-of-students-status-analysis.edit.edit', compact('numberOfStudentsStatusAnalysis', 'minors', 'majors', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberOfStudentsStatusAnalysisRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NumberOfStudentsStatusAnalysisRequest $request, NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        $this->authorize("edit-any-NumberOfStudentsStatusAnalysis");
        $numberOfStudentsStatusAnalysis->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        $this->authorize("delete-any-NumberOfStudentsStatusAnalysis");
        $numberOfStudentsStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
