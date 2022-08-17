<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\AnnualGrowthRateOfStudentEnrollment\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AnnualGrowthRateOfStudentEnrollment\AnnualGrowthRateOfStudentEnrollmentRequest;
use App\Models\Index\AnnualGrowthRateOfStudentEnrollment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 21 Controller
class AnnualGrowthRateOfStudentEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-AnnualGrowthRateOfStudentEnrollment");

        $query = AnnualGrowthRateOfStudentEnrollment::whereRequestsQuery();

        $filterColumnsCheckBoxes = AnnualGrowthRateOfStudentEnrollment::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $annualGrowthRateOfStudentEnrollments = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.annual-growth-rate-of-student-enrollment.list.list', compact('annualGrowthRateOfStudentEnrollments', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getAnnualGrowthRateOfStudentEnrollmentRecords()
    {
        return AnnualGrowthRateOfStudentEnrollment::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $annualGrowthRateOfStudentEnrollments = $this->getAnnualGrowthRateOfStudentEnrollmentRecords();
        return Excel::download(new ListExport($annualGrowthRateOfStudentEnrollments), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $annualGrowthRateOfStudentEnrollments = $this->getAnnualGrowthRateOfStudentEnrollmentRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.annual-growth-rate-of-student-enrollment.list.pdf', compact('annualGrowthRateOfStudentEnrollments'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $annualGrowthRateOfStudentEnrollments = $this->getAnnualGrowthRateOfStudentEnrollmentRecords();
        return view('admin.gostaresh.annual-growth-rate-of-student-enrollment.list.pdf', compact('annualGrowthRateOfStudentEnrollments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-AnnualGrowthRateOfStudentEnrollment");

        return view('admin.gostaresh.annual-growth-rate-of-student-enrollment.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AnnualGrowthRateOfStudentEnrollmentRequest $request
     * @return Response
     */
    public function store(AnnualGrowthRateOfStudentEnrollmentRequest $request)
    {
        $this->authorize("create-any-AnnualGrowthRateOfStudentEnrollment");
        AnnualGrowthRateOfStudentEnrollment::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {
        $this->authorize("edit-any-AnnualGrowthRateOfStudentEnrollment");

        return view(
            'admin.gostaresh.annual-growth-rate-of-student-enrollment.edit.edit', compact('annualGrthRateOfStdnEnrollment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AnnualGrowthRateOfStudentEnrollmentRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AnnualGrowthRateOfStudentEnrollmentRequest $request, AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {
        $this->authorize("edit-any-AnnualGrowthRateOfStudentEnrollment");
        $annualGrthRateOfStdnEnrollment->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {
        $this->authorize("delete-any-AnnualGrowthRateOfStudentEnrollment");

        $annualGrthRateOfStdnEnrollment->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
