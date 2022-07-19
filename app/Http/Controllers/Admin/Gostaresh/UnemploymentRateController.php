<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\UnemploymentRate\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\UnemploymentRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\UnemploymentRate\UnemploymentRateRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 11 Model
class UnemploymentRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = UnemploymentRate::whereRequestsQuery();

        $filterColumnsCheckBoxes = UnemploymentRate::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $unemploymentRates = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.unemployment-rate.list.list', compact('unemploymentRates', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getUnemploymentRateRecords()
    {
        return UnemploymentRate::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $unemploymentRates = $this->getUnemploymentRateRecords();
        return Excel::download(new ListExport($unemploymentRates), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $unemploymentRates = $this->getUnemploymentRateRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.unemployment-rate.list.pdf', compact('unemploymentRates'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $unemploymentRates = $this->getUnemploymentRateRecords();
        return view('admin.gostaresh.unemployment-rate.list.pdf', compact('unemploymentRates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.unemployment-rate.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UnemploymentRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnemploymentRateRequest $request)
    {
        UnemploymentRate::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UnemploymentRate $unemploymentRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UnemploymentRate $unemploymentRate)
    {
        return view('admin.gostaresh.unemployment-rate.edit.edit', compact('unemploymentRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UnemploymentRateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnemploymentRateRequest $request, UnemploymentRate $unemploymentRate)
    {
        $unemploymentRate->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnemploymentRate $unemploymentRate)
    {
        $unemploymentRate->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
