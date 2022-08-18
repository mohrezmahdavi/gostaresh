<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\EconomicParticipationRate\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\EconomicParticipationRate\EconomicParticipationRateRequest;
use App\Models\Index\EconomicParticipationRate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 10 Controller
class EconomicParticipationRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-EconomicParticipationRate");

        $query = EconomicParticipationRate::whereRequestsQuery();

        $filterColumnsCheckBoxes = EconomicParticipationRate::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $economicParticipationRates = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.economic-participation-rate.list.list', compact('economicParticipationRates', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getEconomicParticipationRateRecords()
    {
        return EconomicParticipationRate::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $economicParticipationRates = $this->getEconomicParticipationRateRecords();
        return Excel::download(new ListExport($economicParticipationRates), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $economicParticipationRates = $this->getEconomicParticipationRateRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.economic-participation-rate.list.pdf', compact('economicParticipationRates'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $economicParticipationRates = $this->getEconomicParticipationRateRecords();
        return view('admin.gostaresh.economic-participation-rate.list.pdf', compact('economicParticipationRates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-EconomicParticipationRate");

        return view('admin.gostaresh.economic-participation-rate.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EconomicParticipationRateRequest $request
     * @return Response
     */
    public function store(EconomicParticipationRateRequest $request)
    {
        $this->authorize("create-any-EconomicParticipationRate");
        EconomicParticipationRate::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(EconomicParticipationRate $economicParticipationRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(EconomicParticipationRate $economicParticipationRate)
    {
        $this->authorize("edit-any-EconomicParticipationRate");

        return view(
            'admin.gostaresh.economic-participation-rate.edit.edit', compact('economicParticipationRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EconomicParticipationRateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(EconomicParticipationRateRequest $request, EconomicParticipationRate $economicParticipationRate)
    {
        $this->authorize("edit-any-EconomicParticipationRate");
        $economicParticipationRate->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(EconomicParticipationRate $economicParticipationRate)
    {
        $this->authorize("delete-any-EconomicParticipationRate");
        $economicParticipationRate->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
