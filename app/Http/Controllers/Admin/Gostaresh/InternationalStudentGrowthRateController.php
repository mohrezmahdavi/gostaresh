<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\InternationalStudentGrowthRate\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InternationalStudentGrowthRate\InternationalStudentGrowthRateRequest;
use App\Models\Index\InternationalStudentGrowthRate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class InternationalStudentGrowthRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-InternationalStudentGrowthRate");

        $query = InternationalStudentGrowthRate::whereRequestsQuery();

        $filterColumnsCheckBoxes = InternationalStudentGrowthRate::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $internationalStudentGrowthRates = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.international-student-growth-rate.list.list', compact('internationalStudentGrowthRates', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getInternationalStudentGrowthRateRecords()
    {
        return InternationalStudentGrowthRate::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $internationalStudentGrowthRates = $this->getInternationalStudentGrowthRateRecords();
        return Excel::download(new ListExport($internationalStudentGrowthRates), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $filterColumnsCheckBoxes = InternationalStudentGrowthRate::$filterColumnsCheckBoxes;
        $internationalStudentGrowthRates = $this->getInternationalStudentGrowthRateRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.international-student-growth-rate.list.pdf', compact('internationalStudentGrowthRates', 'filterColumnsCheckBoxes'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $filterColumnsCheckBoxes = InternationalStudentGrowthRate::$filterColumnsCheckBoxes;
        $internationalStudentGrowthRates = $this->getInternationalStudentGrowthRateRecords();
        return view('admin.gostaresh.international-student-growth-rate.list.pdf', compact('internationalStudentGrowthRates', 'filterColumnsCheckBoxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-InternationalStudentGrowthRate");

        return view('admin.gostaresh.international-student-growth-rate.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InternationalStudentGrowthRateRequest $request
     * @return Response
     */
    public function store(InternationalStudentGrowthRateRequest $request)
    {
        $this->authorize("create-any-InternationalStudentGrowthRate");

        InternationalStudentGrowthRate::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InternationalStudentGrowthRate $internationalStudentGrowthRate
     * @return Response
     */
    public function edit(InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        $this->authorize("edit-any-InternationalStudentGrowthRate");

        return view(
            'admin.gostaresh.international-student-growth-rate.edit.edit', compact('internationalStudentGrowthRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InternationalStudentGrowthRateRequest $request
     * @param InternationalStudentGrowthRate $internationalStudentGrowthRate
     * @return Response
     */
    public function update(InternationalStudentGrowthRateRequest $request, InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        $this->authorize("edit-any-InternationalStudentGrowthRate");
        $internationalStudentGrowthRate->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InternationalStudentGrowthRate $internationalStudentGrowthRate
     * @return Response
     */
    public function destroy(InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        $this->authorize("delete-any-InternationalStudentGrowthRate");
        $internationalStudentGrowthRate->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
