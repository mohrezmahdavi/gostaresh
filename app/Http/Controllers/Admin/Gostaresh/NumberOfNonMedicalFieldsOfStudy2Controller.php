<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfNonMedicalFieldsOfStudy2\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberOfNonMedicalFieldsOfStudy2\NumberOfNonMedicalFieldsOfStudy2Request;
use App\Models\Index\NumberOfNonMedicalFieldsOfStudy2;
use App\Models\Major;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 26,27 Controller
class NumberOfNonMedicalFieldsOfStudy2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-NumberOfNonMedicalFieldsOfStudy2");

        $query = NumberOfNonMedicalFieldsOfStudy2::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy2::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfNonMedicalFieldsOfStudies = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-non-medical-fields-of-study2.list.list', compact('numberOfNonMedicalFieldsOfStudies', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords()
    {
        return NumberOfNonMedicalFieldsOfStudy2::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfNonMedicalFieldsOfStudies = $this->getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords();
        return Excel::download(new ListExport($numberOfNonMedicalFieldsOfStudies), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy2::$filterColumnsCheckBoxes;
        $numberOfNonMedicalFieldsOfStudies = $this->getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-non-medical-fields-of-study2.list.pdf', compact('numberOfNonMedicalFieldsOfStudies', 'filterColumnsCheckBoxes'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $filterColumnsCheckBoxes = NumberOfNonMedicalFieldsOfStudy2::$filterColumnsCheckBoxes;
        $numberOfNonMedicalFieldsOfStudies = $this->getStatusAnalysisOfTheNumberOfFieldsOfStudyRecords();
        return view('admin.gostaresh.number-of-non-medical-fields-of-study2.list.pdf', compact('numberOfNonMedicalFieldsOfStudies', 'filterColumnsCheckBoxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-NumberOfNonMedicalFieldsOfStudy2");

        $majors = Major::all();
        return view('admin.gostaresh.number-of-non-medical-fields-of-study2.create.create', compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberOfNonMedicalFieldsOfStudy2Request $request
     * @return Response
     */
    public function store(NumberOfNonMedicalFieldsOfStudy2Request $request)
    {
        $this->authorize("create-any-NumberOfNonMedicalFieldsOfStudy2");

        NumberOfNonMedicalFieldsOfStudy2::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(NumberOfNonMedicalFieldsOfStudy2 $numberOfNonMedicalFieldsOfStudy2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(NumberOfNonMedicalFieldsOfStudy2 $numberOfNonMedicalFieldsOfStudy2)
    {
        $majors = Major::all();
        return view('admin.gostaresh.number-of-non-medical-fields-of-study2.edit.edit', compact('numberOfNonMedicalFieldsOfStudy2', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberOfNonMedicalFieldsOfStudy2Request $request
     * @param int $id
     * @return Response
     */
    public function update(NumberOfNonMedicalFieldsOfStudy2Request $request, NumberOfNonMedicalFieldsOfStudy2 $numberOfNonMedicalFieldsOfStudy2)
    {
        $this->authorize("edit-any-NumberOfNonMedicalFieldsOfStudy2");
        $numberOfNonMedicalFieldsOfStudy2->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(NumberOfNonMedicalFieldsOfStudy2 $numberOfNonMedicalFieldsOfStudy2)
    {
        $this->authorize("delete-any-NumberOfNonMedicalFieldsOfStudy2");
        $numberOfNonMedicalFieldsOfStudy2->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
