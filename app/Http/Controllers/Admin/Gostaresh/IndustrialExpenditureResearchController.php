<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\IndustrialExpenditureResearch\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\IndustrialExpenditureResearch\IndustrialExpenditureResearchRequest;
use App\Models\Index\IndustrialExpenditureResearch;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 9 Controller
class IndustrialExpenditureResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-IndustrialExpenditureResearch");

        $query = IndustrialExpenditureResearch::whereRequestsQuery();

        $filterColumnsCheckBoxes = IndustrialExpenditureResearch::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $industrialExpenditureResearches = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.industrial-expenditure-research.list.list', compact('industrialExpenditureResearches', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getIndustrialExpenditureResearchRecords()
    {
        return IndustrialExpenditureResearch::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $industrialExpenditureResearches = $this->getIndustrialExpenditureResearchRecords();
        return Excel::download(new ListExport($industrialExpenditureResearches), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $industrialExpenditureResearches = $this->getIndustrialExpenditureResearchRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.industrial-expenditure-research.list.pdf', compact('industrialExpenditureResearches'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $industrialExpenditureResearches = $this->getIndustrialExpenditureResearchRecords();
        return view('admin.gostaresh.industrial-expenditure-research.list.pdf', compact('industrialExpenditureResearches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-IndustrialExpenditureResearch");

        return view('admin.gostaresh.industrial-expenditure-research.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IndustrialExpenditureResearchRequest $request
     * @return Response
     */
    public function store(IndustrialExpenditureResearchRequest $request)
    {
        $this->authorize("create-any-IndustrialExpenditureResearch");

        IndustrialExpenditureResearch::create([
            'user_id'           => Auth::user()?->id,
            'country_id'        => $request->country_id ?? 1,
            'province_id'       => $request->province_id ?? null,
            'county_id'         => $request->county_id ?? null,
            'city_id'           => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'amount'            => $request->amount_payment_rd ?? 0,
            'year'              => $request->year ?? null,
            'month'             => $request->month ?? null,
        ]);
        // IndustrialExpenditureResearch::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        $this->authorize("edit-any-IndustrialExpenditureResearch");

        return view(
            'admin.gostaresh.industrial-expenditure-research.edit.edit', compact('industrialExpenditureResearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param IndustrialExpenditureResearchRequest $request
     * @param int $id
     * @return Response
     */
    public function update(IndustrialExpenditureResearchRequest $request, IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        $this->authorize("edit-any-IndustrialExpenditureResearch");

        $industrialExpenditureResearch->update([
            'country_id'        => $request->country_id ?? 1,
            'province_id'       => $request->province_id ?? null,
            'county_id'         => $request->county_id ?? null,
            'city_id'           => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'amount'            => $request->amount_payment_rd ?? 0,
            'year'              => $request->year ?? null,
            'month'             => $request->month ?? null,
        ]);
        // $industrialExpenditureResearch->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        $this->authorize("delete-any-IndustrialExpenditureResearch");
        $industrialExpenditureResearch->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
