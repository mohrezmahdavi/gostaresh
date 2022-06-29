<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\InternationalResearchStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 36,37 Controller
class InternationalResearchStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internationalResearchStatusAnalysis = InternationalResearchStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.international-research-status-analyses.list.list', compact('internationalResearchStatusAnalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.international-research-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        InternationalResearchStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearchStatusAnalysis
     * @return void
     */
    public function show(InternationalResearchStatusAnalysis $internationalResearchStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return \Illuminate\Http\Response
     */
    public function edit(InternationalResearchStatusAnalysis $internationalResearch)
    {
        return view('admin.gostaresh.international-research-status-analyses.edit.edit', compact('internationalResearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternationalResearchStatusAnalysis $internationalResearch)
    {
        $internationalResearch->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternationalResearchStatusAnalysis $internationalResearch)
    {
        $internationalResearch->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
