<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\GeographicalLocationOfUnit\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GeographicalLocationOfUnit\GeographicalLocationOfUnitRequest;
use App\Models\Index\GeographicalLocationOfUnit;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 2 Controller
class GeographicalLocationOfUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-GeographicalLocationOfUnit");

        $query = GeographicalLocationOfUnit::whereRequestsQuery();
        $geographicalLocationOfUnits = $query->orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.geographical-location-of-unit.list.list', compact('geographicalLocationOfUnits'));
    }

    private function getGeographicalLocationOfUnitRecords()
    {
        return GeographicalLocationOfUnit::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }


    public function listExcelExport()
    {
        $geographicalLocationOfUnits = $this->getGeographicalLocationOfUnitRecords();
        return Excel::download(new ListExport($geographicalLocationOfUnits), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $geographicalLocationOfUnits = $this->getGeographicalLocationOfUnitRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.geographical-location-of-unit.list.pdf', compact('geographicalLocationOfUnits'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $geographicalLocationOfUnits = $this->getGeographicalLocationOfUnitRecords();
        return view('admin.gostaresh.geographical-location-of-unit.list.pdf', compact('geographicalLocationOfUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-GeographicalLocationOfUnit");

        return view('admin.gostaresh.geographical-location-of-unit.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GeographicalLocationOfUnitRequest $request
     * @return Response
     */
    public function store(GeographicalLocationOfUnitRequest $request)
    {
        $this->authorize("create-any-GeographicalLocationOfUnit");
        GeographicalLocationOfUnit::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(GeographicalLocationOfUnit $geographicalLocationOfUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(GeographicalLocationOfUnit $geographicalLocationOfUnit)
    {
        $this->authorize("edit-any-GeographicalLocationOfUnit");

        return view(
            'admin.gostaresh.geographical-location-of-unit.edit.edit', compact('geographicalLocationOfUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GeographicalLocationOfUnitRequest $request
     * @param int $id
     * @return Response
     */
    public function update(GeographicalLocationOfUnitRequest $request, GeographicalLocationOfUnit $geographicalLocationOfUnit)
    {
        $this->authorize("edit-any-GeographicalLocationOfUnit");
        $geographicalLocationOfUnit->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(GeographicalLocationOfUnit $geographicalLocationOfUnit)
    {
        $this->authorize("delete-any-GeographicalLocationOfUnit");
        $geographicalLocationOfUnit->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
