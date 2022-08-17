<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\UnitsGeneralStatus\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\UnitsGeneralStatus\UnitsGeneralStatusRequest;
use App\Models\Index\UnitsGeneralStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 57 Controller
class UnitsGeneralStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-UnitsGeneralStatus");

        $query = UnitsGeneralStatus::whereRequestsQuery();

        $filterColumnsCheckBoxes = UnitsGeneralStatus::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $unitsGeneralStatuses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.units-general-status.list.list', compact('unitsGeneralStatuses'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }


    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getUnitsGeneralStatusRecords()
    {
        return UnitsGeneralStatus::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $unitsGeneralStatuses = $this->getUnitsGeneralStatusRecords();
        return Excel::download(new ListExport($unitsGeneralStatuses), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $unitsGeneralStatuses = $this->getUnitsGeneralStatusRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.units-general-status.list.pdf', compact('unitsGeneralStatuses'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $unitsGeneralStatuses = $this->getUnitsGeneralStatusRecords();
        return view('admin.gostaresh.units-general-status.list.pdf', compact('unitsGeneralStatuses'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-UnitsGeneralStatus");

        return view('admin.gostaresh.units-general-status.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitsGeneralStatusRequest $request
     * @return Response
     */
    public function store(UnitsGeneralStatusRequest $request)
    {
        $this->authorize("create-any-UnitsGeneralStatus");

        UnitsGeneralStatus::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return void
     */
    public function show(UnitsGeneralStatus $unitsGeneralStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return Response
     */
    public function edit(UnitsGeneralStatus $unitsGeneralStatus)
    {
        $this->authorize("edit-any-UnitsGeneralStatus");

        return view(
            'admin.gostaresh.units-general-status.edit.edit', compact('unitsGeneralStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UnitsGeneralStatusRequest $request
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return Response
     */
    public function update(UnitsGeneralStatusRequest $request, UnitsGeneralStatus $unitsGeneralStatus)
    {
        $this->authorize("edit-any-UnitsGeneralStatus");

        $unitsGeneralStatus->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return Response
     */
    public function destroy(UnitsGeneralStatus $unitsGeneralStatus)
    {
        $this->authorize("delete-any-UnitsGeneralStatus");

        $unitsGeneralStatus->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
