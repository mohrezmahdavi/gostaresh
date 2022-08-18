<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\StudentAdmissionCapacity\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\StudentAdmissionCapacity\StudentAdmissionCapacityRequest;
use App\Models\Index\StudentAdmissionCapacity;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 24 Controller
class StudentAdmissionCapacityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-StudentAdmissionCapacity");

        $query = StudentAdmissionCapacity::whereRequestsQuery();

        $filterColumnsCheckBoxes = StudentAdmissionCapacity::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $studentAdmissionCapacities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.student-admission-capacity.list.list', compact('studentAdmissionCapacities', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getStudentAdmissionCapacityRecords()
    {
        return StudentAdmissionCapacity::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $studentAdmissionCapacities = $this->getStudentAdmissionCapacityRecords();
        return Excel::download(new ListExport($studentAdmissionCapacities), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $filterColumnsCheckBoxes = StudentAdmissionCapacity::$filterColumnsCheckBoxes;
        $studentAdmissionCapacities = $this->getStudentAdmissionCapacityRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.student-admission-capacity.list.pdf', compact('studentAdmissionCapacities', 'filterColumnsCheckBoxes'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $filterColumnsCheckBoxes = StudentAdmissionCapacity::$filterColumnsCheckBoxes;
        $studentAdmissionCapacities = $this->getStudentAdmissionCapacityRecords();
        return view('admin.gostaresh.student-admission-capacity.list.pdf', compact('studentAdmissionCapacities', 'filterColumnsCheckBoxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-StudentAdmissionCapacity");

        return view('admin.gostaresh.student-admission-capacity.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StudentAdmissionCapacityRequest $request
     * @return Response
     */
    public function store(StudentAdmissionCapacityRequest $request)
    {
        $this->authorize("create-any-StudentAdmissionCapacity");

        StudentAdmissionCapacity::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(StudentAdmissionCapacity $studentAdmissionCapacity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(StudentAdmissionCapacity $studentAdmissionCapacity)
    {
        $this->authorize("edit-any-StudentAdmissionCapacity");

        return view(
            'admin.gostaresh.student-admission-capacity.edit.edit', compact('studentAdmissionCapacity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StudentAdmissionCapacityRequest $request
     * @param int $id
     * @return Response
     */
    public function update(StudentAdmissionCapacityRequest $request, StudentAdmissionCapacity $studentAdmissionCapacity)
    {
        $this->authorize("edit-any-StudentAdmissionCapacity");

        $studentAdmissionCapacity->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(StudentAdmissionCapacity $studentAdmissionCapacity)
    {
        $this->authorize("delete-any-StudentAdmissionCapacity");

        $studentAdmissionCapacity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
