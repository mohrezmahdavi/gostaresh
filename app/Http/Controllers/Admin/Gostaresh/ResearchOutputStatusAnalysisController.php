<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\ResearchOutputStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 35 Controller
class ResearchOutputStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researchOutputStatusAnalysis = ResearchOutputStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.research-output-status-analyses.list.list', compact('researchOutputStatusAnalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.research-output-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ResearchOutputStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param ResearchOutputStatusAnalysis $ResearchOutputStatusAnalysis
     * @return void
     */
    public function show(ResearchOutputStatusAnalysis $ResearchOutputStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(ResearchOutputStatusAnalysis $researchOutputStatusAnalysis)
    {
        return view('admin.gostaresh.research-output-status-analyses.edit.edit', compact('researchOutputStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResearchOutputStatusAnalysis $researchOutputStatusAnalysis)
    {
        $researchOutputStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResearchOutputStatusAnalysis $researchOutputStatusAnalysis)
    {
        $researchOutputStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
