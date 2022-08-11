<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfAdmissionsStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfAdmissionsStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfAdmissionsStatusAnalysis\NumberOfAdmissionsStatusAnalysisRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 19 Controller
class NumberOfAdmissionsStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfAdmissionsStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfAdmissionsStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfAdmissionsStatusAnalysises = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-admissions-status-analysis.list.list', compact('numberOfAdmissionsStatusAnalysises', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfAdmissionsStatusAnalysisRecords()
    {
        return NumberOfAdmissionsStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfAdmissionsStatusAnalysises = $this->getNumberOfAdmissionsStatusAnalysisRecords();
        return Excel::download(new ListExport($numberOfAdmissionsStatusAnalysises), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberOfAdmissionsStatusAnalysises = $this->getNumberOfAdmissionsStatusAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-admissions-status-analysis.list.pdf', compact('numberOfAdmissionsStatusAnalysises'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberOfAdmissionsStatusAnalysises = $this->getNumberOfAdmissionsStatusAnalysisRecords();
        return view('admin.gostaresh.number-of-admissions-status-analysis.list.pdf', compact('numberOfAdmissionsStatusAnalysises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-admissions-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfAdmissionsStatusAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfAdmissionsStatusAnalysisRequest $request)
    {
        NumberOfAdmissionsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        return view('admin.gostaresh.number-of-admissions-status-analysis.edit.edit', compact('numberOfAdmissionsStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfAdmissionsStatusAnalysisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfAdmissionsStatusAnalysisRequest $request, NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        $numberOfAdmissionsStatusAnalysis->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        $numberOfAdmissionsStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
