<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\RoadmapDesired\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\RoadmapDesired\RoadmapDesiredRequest;
use App\Models\Index\RoadmapToAchieveDesiredSituation;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 58 Controller
class RoadmapDesiredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $query = RoadmapToAchieveDesiredSituation::whereRequestsQuery();

        $filterColumnsCheckBoxes = RoadmapToAchieveDesiredSituation::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $roadmapDesireds = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.roadmap-desired.list.list', compact('roadmapDesireds'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getRoadmapDesiredRecords()
    {
        return RoadmapToAchieveDesiredSituation::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $roadmapDesireds = $this->getRoadmapDesiredRecords();
        return Excel::download(new ListExport($roadmapDesireds), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $roadmapDesireds = $this->getRoadmapDesiredRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.roadmap-desired.list.pdf', compact('roadmapDesireds'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $roadmapDesireds = $this->getRoadmapDesiredRecords();
        return view('admin.gostaresh.roadmap-desired.list.pdf', compact('roadmapDesireds'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.roadmap-desired.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoadmapDesiredRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoadmapDesiredRequest $request)
    {
        RoadmapToAchieveDesiredSituation::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param RoadmapToAchieveDesiredSituation $roadmapDesired
     * @return void
     */
    public function show(RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoadmapToAchieveDesiredSituation $roadmapDesired
     * @return \Illuminate\Http\Response
     */
    public function edit(RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        return view('admin.gostaresh.roadmap-desired.edit.edit', compact('roadmapDesired'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoadmapDesiredRequest $request
     * @param RoadmapToAchieveDesiredSituation $roadmapDesired
     * @return \Illuminate\Http\Response
     */
    public function update(RoadmapDesiredRequest $request, RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        $roadmapDesired->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoadmapToAchieveDesiredSituation $roadmapDesired
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        $roadmapDesired->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
