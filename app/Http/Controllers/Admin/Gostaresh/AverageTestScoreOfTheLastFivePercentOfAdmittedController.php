<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmitted\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AverageTestScoreOfTheLastFivePercentOfAdmitted\AverageTestScoreOfTheLastFivePercentOfAdmittedRequest;
use App\Models\Index\AverageTestScoreOfTheLastFivePercentOfAdmitted;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 23 Controller
class AverageTestScoreOfTheLastFivePercentOfAdmittedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-AverageTestScoreOfTheLastFivePercentOfAdmitted");

        $query = AverageTestScoreOfTheLastFivePercentOfAdmitted::whereRequestsQuery();

        $filterColumnsCheckBoxes = AverageTestScoreOfTheLastFivePercentOfAdmitted::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $averageTestScoreOfTheLastFivePercentOfAdmitteds = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.list.list', compact('averageTestScoreOfTheLastFivePercentOfAdmitteds', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getAverageTestScoreOfTheLastFivePercentOfAdmittedRecords()
    {
        return AverageTestScoreOfTheLastFivePercentOfAdmitted::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $averageTestScoreOfTheLastFivePercentOfAdmitteds = $this->getAverageTestScoreOfTheLastFivePercentOfAdmittedRecords();
        return Excel::download(new ListExport($averageTestScoreOfTheLastFivePercentOfAdmitteds), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $averageTestScoreOfTheLastFivePercentOfAdmitteds = $this->getAverageTestScoreOfTheLastFivePercentOfAdmittedRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.list.pdf', compact('averageTestScoreOfTheLastFivePercentOfAdmitteds'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $averageTestScoreOfTheLastFivePercentOfAdmitteds = $this->getAverageTestScoreOfTheLastFivePercentOfAdmittedRecords();
        return view('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.list.pdf', compact('averageTestScoreOfTheLastFivePercentOfAdmitteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-AverageTestScoreOfTheLastFivePercentOfAdmitted");

        return view('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AverageTestScoreOfTheLastFivePercentOfAdmittedRequest $request
     * @return Response
     */
    public function store(AverageTestScoreOfTheLastFivePercentOfAdmittedRequest $request)
    {
        $this->authorize("create-any-AverageTestScoreOfTheLastFivePercentOfAdmitted");
        AverageTestScoreOfTheLastFivePercentOfAdmitted::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(AverageTestScoreOfTheLastFivePercentOfAdmitted $avgTstScOfLastFivePctOfAdmitted)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(AverageTestScoreOfTheLastFivePercentOfAdmitted $avgTstScOfLastFivePctOfAdmitted)
    {
        $this->authorize("edit-any-AverageTestScoreOfTheLastFivePercentOfAdmitted");

        return view(
            'admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.edit.edit', compact('avgTstScOfLastFivePctOfAdmitted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AverageTestScoreOfTheLastFivePercentOfAdmittedRequest $request
     * @param int $id
     * @return Response
     */
    public function update(AverageTestScoreOfTheLastFivePercentOfAdmittedRequest $request, AverageTestScoreOfTheLastFivePercentOfAdmitted $avgTstScOfLastFivePctOfAdmitted)
    {
        $this->authorize("edit-any-AverageTestScoreOfTheLastFivePercentOfAdmitted");
        $avgTstScOfLastFivePctOfAdmitted->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(AverageTestScoreOfTheLastFivePercentOfAdmitted $avgTstScOfLastFivePctOfAdmitted)
    {
        $this->authorize("delete-any-AverageTestScoreOfTheLastFivePercentOfAdmitted");
        $avgTstScOfLastFivePctOfAdmitted->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
