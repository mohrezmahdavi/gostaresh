<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfNonMedicalFieldsOfStudy\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfNonMedicalFieldsOfStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfNonMedicalFieldsOfStudy\NumberOfNonMedicalFieldsOfStudyRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 26,27 Controller
class NumberOfNonMedicalFieldsOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfNonMedicalFieldsOfStudy::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfNonMedicalFieldsOfStudies = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-non-medical-fields-of-study.list.list', compact('numberOfNonMedicalFieldsOfStudies', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords()
    {
        return NumberOfNonMedicalFieldsOfStudy::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfNonMedicalFieldsOfStudies = $this->getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords();
        return Excel::download(new ListExport($numberOfNonMedicalFieldsOfStudies), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy::$filterColumnsCheckBoxes;
        $numberOfNonMedicalFieldsOfStudies = $this->getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-non-medical-fields-of-study.list.pdf', compact('numberOfNonMedicalFieldsOfStudies','filterColumnsCheckBoxes'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy::$filterColumnsCheckBoxes;
        $numberOfNonMedicalFieldsOfStudies = $this->getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords();
        return view('admin.gostaresh.number-of-non-medical-fields-of-study.list.pdf', compact('numberOfNonMedicalFieldsOfStudies', 'filterColumnsCheckBoxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-non-medical-fields-of-study.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfNonMedicalFieldsOfStudyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfNonMedicalFieldsOfStudyRequest $request)
    {
        NumberOfNonMedicalFieldsOfStudy::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        return view('admin.gostaresh.number-of-non-medical-fields-of-study.edit.edit', compact('numberOfNonMedicalFieldsOfStudy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfNonMedicalFieldsOfStudyRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfNonMedicalFieldsOfStudyRequest $request, NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        $numberOfNonMedicalFieldsOfStudy->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        $numberOfNonMedicalFieldsOfStudy->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
