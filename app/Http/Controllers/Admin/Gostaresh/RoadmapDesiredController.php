<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\RoadmapDesired\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\RoadmapDesired\RoadmapDesiredRequest;
use App\Models\Index\RoadmapToAchieveDesiredSituation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 58 Controller
class RoadmapDesiredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $this->authorize("view-any-RoadmapToAchieveDesiredSituation");

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
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-RoadmapToAchieveDesiredSituation");

        return view('admin.gostaresh.roadmap-desired.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoadmapDesiredRequest $request
     * @return Response
     */
    public function store(RoadmapDesiredRequest $request)
    {
        $this->authorize("create-any-RoadmapToAchieveDesiredSituation");

        RoadmapToAchieveDesiredSituation::create(array_merge(['user_id' => Auth::id()], $request->validated()));
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
     * @return Response
     */
    public function edit(RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        $this->authorize("edit-any-RoadmapToAchieveDesiredSituation");

        return view(
            'admin.gostaresh.roadmap-desired.edit.edit', compact('roadmapDesired'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoadmapDesiredRequest $request
     * @param RoadmapToAchieveDesiredSituation $roadmapDesired
     * @return Response
     */
    public function update(RoadmapDesiredRequest $request, RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        $this->authorize("edit-any-RoadmapToAchieveDesiredSituation");

        $roadmapDesired->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoadmapToAchieveDesiredSituation $roadmapDesired
     * @return Response
     */
    public function destroy(RoadmapToAchieveDesiredSituation $roadmapDesired)
    {
        $this->authorize("delete-any-RoadmapToAchieveDesiredSituation");

        $roadmapDesired->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
