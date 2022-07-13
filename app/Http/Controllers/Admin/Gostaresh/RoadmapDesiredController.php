<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\RoadmapDesired\RoadmapDesiredRequest;
use App\Models\Index\RoadmapToAchieveDesiredSituation;
use Illuminate\Support\Facades\Auth;

// Table 58 Controller
class RoadmapDesiredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = RoadmapToAchieveDesiredSituation::query();

        $query = filterByOwnProvince($query);

        $roadmapDesireds = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.roadmap-desired.list.list', compact('roadmapDesireds'));
    }

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
