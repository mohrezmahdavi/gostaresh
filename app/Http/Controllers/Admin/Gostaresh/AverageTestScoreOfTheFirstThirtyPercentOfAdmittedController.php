<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest;
use App\Models\Index\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 22 Controller
class AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted");

        $query = AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::whereRequestsQuery();

        $filterColumnsCheckBoxes = AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.list', compact('averageTestScoreOfTheFirstThirtyPercentOfAdmitteds', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getAverageTestScoreOfTheFirstThirtyPercentOfAdmittedRecords()
    {
        return AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds = $this->getAverageTestScoreOfTheFirstThirtyPercentOfAdmittedRecords();
        return Excel::download(new ListExport($averageTestScoreOfTheFirstThirtyPercentOfAdmitteds), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds = $this->getAverageTestScoreOfTheFirstThirtyPercentOfAdmittedRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.pdf', compact('averageTestScoreOfTheFirstThirtyPercentOfAdmitteds'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds = $this->getAverageTestScoreOfTheFirstThirtyPercentOfAdmittedRecords();
        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.pdf', compact('averageTestScoreOfTheFirstThirtyPercentOfAdmitteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted");

        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request
     * @return Response
     */
    public function store(AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request)
    {
        $this->authorize("create-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted");
        AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        $this->authorize("edit-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted");

        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.edit.edit', compact('avgTstScrOfFrtThrtPrntOfAdmitted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request, AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        $this->authorize("edit-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted");
        $avgTstScrOfFrtThrtPrntOfAdmitted->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        $this->authorize("delete-any-AverageTestScoreOfTheFirstThirtyPercentOfAdmitted");
        $avgTstScrOfFrtThrtPrntOfAdmitted->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
