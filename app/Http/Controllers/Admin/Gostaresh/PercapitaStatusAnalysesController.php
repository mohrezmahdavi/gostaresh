<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\PercapitaStatusAnalysis\AssetProductivityRequest;
use App\Models\Index\PercapitaStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 46 Controller
class PercapitaStatusAnalysesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percapitaStatusAnalyses =  PercapitaStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.percapita-status-analyses.list.list', compact('percapitaStatusAnalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.percapita-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssetProductivityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetProductivityRequest $request)
    {
         PercapitaStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param PercapitaStatusAnalysis $percapitaStatusAnalysis
     * @return void
     */
    public function show(PercapitaStatusAnalysis $percapitaStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PercapitaStatusAnalysis $percapitaStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(PercapitaStatusAnalysis $percapitaStatusAnalysis)
    {
        return view('admin.gostaresh.percapita-status-analyses.edit.edit', compact('percapitaStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssetProductivityRequest $request
     * @param PercapitaStatusAnalysis $percapitaStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(AssetProductivityRequest $request, PercapitaStatusAnalysis $percapitaStatusAnalysis)
    {
        $percapitaStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PercapitaStatusAnalysis $percapitaStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(PercapitaStatusAnalysis $percapitaStatusAnalysis)
    {
        $percapitaStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
