<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\CostChangesTrends\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\CostChangesTrends\CostChangesTrendsRequest;
use App\Models\Index\CostChangesTrendsAnalysis;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 54 Controller
class CostChangesTrendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize("view-any-CostChangesTrendsAnalysis");

        $query = CostChangesTrendsAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = CostChangesTrendsAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $costChangesTrends = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.cost-changes-trends.list.list', compact('costChangesTrends'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getCostChangesTrendsAnalysisRecords()
    {
        return CostChangesTrendsAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $costChangesTrends = $this->getCostChangesTrendsAnalysisRecords();
        return Excel::download(new ListExport($costChangesTrends), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $costChangesTrends = $this->getCostChangesTrendsAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.cost-changes-trends.list.pdf', compact('costChangesTrends'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $costChangesTrends = $this->getCostChangesTrendsAnalysisRecords();
        return view('admin.gostaresh.cost-changes-trends.list.pdf', compact('costChangesTrends'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-CostChangesTrendsAnalysis");

        return view('admin.gostaresh.cost-changes-trends.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CostChangesTrendsRequest $request
     * @return Response
     */
    public function store(CostChangesTrendsRequest $request)
    {
        $this->authorize("create-any-CostChangesTrendsAnalysis");
        CostChangesTrendsAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return void
     */
    public function show(CostChangesTrendsAnalysis $costChangesTrend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return Response
     */
    public function edit(CostChangesTrendsAnalysis $costChangesTrend)
    {
        $this->authorize("edit-any-CostChangesTrendsAnalysis");

        return view('admin.gostaresh.cost-changes-trends.edit.edit', compact('costChangesTrend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CostChangesTrendsRequest $request
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return Response
     */
    public function update(CostChangesTrendsRequest $request, CostChangesTrendsAnalysis $costChangesTrend)
    {
        $this->authorize("edit-any-CostChangesTrendsAnalysis");
        $costChangesTrend->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return Response
     */
    public function destroy(CostChangesTrendsAnalysis $costChangesTrend)
    {
        $this->authorize("delete-any-CostChangesTrendsAnalysis");
        $costChangesTrend->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
