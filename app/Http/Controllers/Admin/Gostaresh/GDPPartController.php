<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\GDPPart\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\GDPPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\GDPPart\GDPPartRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 6 Controller
class GDPPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = GDPPart::whereRequestsQuery();

        $filterColumnsCheckBoxes = GDPPart::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $gdpParts = $query->orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.gdp-part.list.list', compact('gdpParts', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getGDPPartRecords()
    {
        return GDPPart::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $gdpParts = $this->getGDPPartRecords();
        return Excel::download(new ListExport($gdpParts), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $gdpParts = $this->getGDPPartRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.gdp-part.list.pdf', compact('gdpParts'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $gdpParts = $this->getGDPPartRecords();
        return view('admin.gostaresh.gdp-part.list.pdf', compact('gdpParts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.gdp-part.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  GDPPartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GDPPartRequest $request)
    {
        GDPPart::create(array_merge(['user_id' => Auth::id()] , $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GDPPart $gdpPart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GDPPart $gdpPart)
    {
        return view('admin.gostaresh.gdp-part.edit.edit', compact('gdpPart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  GDPPartRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GDPPartRequest $request, GDPPart $gdpPart)
    {
        $gdpPart->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GDPPart $gdpPart)
    {
        $gdpPart->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
