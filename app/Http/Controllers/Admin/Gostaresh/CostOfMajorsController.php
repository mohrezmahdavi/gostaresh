<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\CostOfMajors\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\CostOfMajors\CostOfMajorsRequest;
use App\Models\Index\AverageCostOfMajor;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 55 Controller
class CostOfMajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = AverageCostOfMajor::whereRequestsQuery();

        $filterColumnsCheckBoxes = AverageCostOfMajor::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $costOfMajors = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.cost-of-majors.list.list', compact('costOfMajors'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getAverageCostOfMajorRecords()
    {
        return AverageCostOfMajor::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $costOfMajors = $this->getAverageCostOfMajorRecords();
        return Excel::download(new ListExport($costOfMajors), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $costOfMajors = $this->getAverageCostOfMajorRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.cost-of-majors.list.pdf', compact('costOfMajors'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $costOfMajors = $this->getAverageCostOfMajorRecords();
        return view('admin.gostaresh.cost-of-majors.list.pdf', compact('costOfMajors'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.cost-of-majors.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CostOfMajorsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostOfMajorsRequest $request)
    {
        AverageCostOfMajor::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param AverageCostOfMajor $costOfMajor
     * @return void
     */
    public function show(AverageCostOfMajor $costOfMajor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AverageCostOfMajor $costOfMajor
     * @return \Illuminate\Http\Response
     */
    public function edit(AverageCostOfMajor $costOfMajor)
    {
        return view('admin.gostaresh.cost-of-majors.edit.edit', compact('costOfMajor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CostOfMajorsRequest $request
     * @param AverageCostOfMajor $costOfMajor
     * @return \Illuminate\Http\Response
     */
    public function update(CostOfMajorsRequest $request, AverageCostOfMajor $costOfMajor)
    {
        $costOfMajor->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AverageCostOfMajor $costOfMajor
     * @return \Illuminate\Http\Response
     */
    public function destroy(AverageCostOfMajor $costOfMajor)
    {
        $costOfMajor->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
