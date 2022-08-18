<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfRegistrantsStatusAnalysis\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\NumberOfRegistrantsStatusAnalysis\NumberOfRegistrantsStatusAnalysisRequest;
use App\Models\Index\NumberOfRegistrantsStatusAnalysis;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 20 Controller
class NumberOfRegistrantsStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-NumberOfRegistrantsStatusAnalysis");

        $query = NumberOfRegistrantsStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfRegistrantsStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfRegistrants = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-registrants-status-analysis.list.list', compact('numberOfRegistrants', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfRegistrantsStatusAnalysisRecords()
    {
        return NumberOfRegistrantsStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfRegistrants = $this->getNumberOfRegistrantsStatusAnalysisRecords();
        return Excel::download(new ListExport($numberOfRegistrants), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberOfRegistrants = $this->getNumberOfRegistrantsStatusAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-registrants-status-analysis.list.pdf', compact('numberOfRegistrants'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberOfRegistrants = $this->getNumberOfRegistrantsStatusAnalysisRecords();
        return view('admin.gostaresh.number-of-registrants-status-analysis.list.pdf', compact('numberOfRegistrants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-NumberOfRegistrantsStatusAnalysis");

        return view('admin.gostaresh.number-of-registrants-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NumberOfRegistrantsStatusAnalysisRequest $request
     * @return Response
     */
    public function store(NumberOfRegistrantsStatusAnalysisRequest $request)
    {
        $this->authorize("create-any-NumberOfRegistrantsStatusAnalysis");

        NumberOfRegistrantsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {
        $this->authorize("edit-any-NumberOfRegistrantsStatusAnalysis");

        return view(
            'admin.gostaresh.number-of-registrants-status-analysis.edit.edit', compact('numberOfRegistrant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NumberOfRegistrantsStatusAnalysisRequest $request
     * @param int $id
     * @return Response
     */
    public function update(NumberOfRegistrantsStatusAnalysisRequest $request, NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {
        $this->authorize("edit-any-NumberOfRegistrantsStatusAnalysis");
        $numberOfRegistrant->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {
        $this->authorize("delete-any-NumberOfRegistrantsStatusAnalysis");
        $numberOfRegistrant->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
