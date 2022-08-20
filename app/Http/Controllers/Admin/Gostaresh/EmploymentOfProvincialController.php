<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\EmploymentOfProvincial\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\EmploymentOfProvincial\EmploymentOfProvincialRequest;
use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 12 Controller
class EmploymentOfProvincialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-EmploymentOfProvincial");

        $query = EmploymentOfProvincial::whereRequestsQuery();

        $filterColumnsCheckBoxes = EmploymentOfProvincial::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $employmentOfProvincials = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.employment-of-provincial.list.list', compact('employmentOfProvincials', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getEmploymentOfProvincialRecords()
    {
        return EmploymentOfProvincial::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $employmentOfProvincials = $this->getEmploymentOfProvincialRecords();
        return Excel::download(new ListExport($employmentOfProvincials), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $employmentOfProvincials = $this->getEmploymentOfProvincialRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.employment-of-provincial.list.pdf', compact('employmentOfProvincials'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $employmentOfProvincials = $this->getEmploymentOfProvincialRecords();
        return view('admin.gostaresh.employment-of-provincial.list.pdf', compact('employmentOfProvincials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-EmploymentOfProvincial");

        return view('admin.gostaresh.employment-of-provincial.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmploymentOfProvincialRequest $request
     * @return Response
     */
    public function store(EmploymentOfProvincialRequest $request)
    {
        $this->authorize("create-any-EmploymentOfProvincial");
        EmploymentOfProvincial::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(EmploymentOfProvincial $employmentOfProvincial)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(EmploymentOfProvincial $employmentOfProvincial)
    {
        $this->authorize("edit-any-EmploymentOfProvincial");

        return view(
            'admin.gostaresh.employment-of-provincial.edit.edit', compact('employmentOfProvincial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmploymentOfProvincialRequest $request
     * @param int $id
     * @return Response
     */
    public function update(EmploymentOfProvincialRequest $request, EmploymentOfProvincial $employmentOfProvincial)
    {
        $this->authorize("edit-any-EmploymentOfProvincial");
        $employmentOfProvincial->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(EmploymentOfProvincial $employmentOfProvincial)
    {
        $this->authorize("delete-any-EmploymentOfProvincial");
        $employmentOfProvincial->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
