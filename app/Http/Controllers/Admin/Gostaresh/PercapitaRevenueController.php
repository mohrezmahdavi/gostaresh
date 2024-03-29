<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\PercapitaRevenue\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\PercapitaRevenue\PercapitaRevenueRequest;
use App\Models\Index\PercapitaRevenueStatusAnalysis;
use App\Models\Major;
use App\Models\Minor;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 51 Controller
class PercapitaRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-PercapitaRevenueStatusAnalysis");

        $query = PercapitaRevenueStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = PercapitaRevenueStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $percapitaRevenue = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.percapita-revenue.list.list', compact('percapitaRevenue'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getPercapitaRevenueRecords()
    {
        return PercapitaRevenueStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $percapitaRevenues = $this->getPercapitaRevenueRecords();
        return Excel::download(new ListExport($percapitaRevenues), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $percapitaRevenues = $this->getPercapitaRevenueRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.percapita-revenue.list.pdf', compact('percapitaRevenues'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $percapitaRevenues = $this->getPercapitaRevenueRecords();
        return view('admin.gostaresh.percapita-revenue.list.pdf', compact('percapitaRevenues'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-PercapitaRevenueStatusAnalysis");

        $majors = Major::all();
        $minors = Minor::all();
        return view('admin.gostaresh.percapita-revenue.create.create', compact('majors', 'minors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PercapitaRevenueRequest $request
     * @return Response
     */
    public function store(PercapitaRevenueRequest $request)
    {
        $this->authorize("create-any-PercapitaRevenueStatusAnalysis");

        PercapitaRevenueStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return void
     */
    public function show(PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return Response
     */
    public function edit(PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        $majors = Major::all();
        $minors = Minor::all();
        return view('admin.gostaresh.percapita-revenue.edit.edit', compact('percapitaRevenue', 'majors', 'minors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PercapitaRevenueRequest $request
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return Response
     */
    public function update(PercapitaRevenueRequest $request, PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        $this->authorize("edit-any-PercapitaRevenueStatusAnalysis");
        $percapitaRevenue->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return Response
     */
    public function destroy(PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        $this->authorize("delete-any-PercapitaRevenueStatusAnalysis");
        $percapitaRevenue->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
