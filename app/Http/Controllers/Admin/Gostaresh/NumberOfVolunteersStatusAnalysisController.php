<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfVolunteersStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 18 Controller
class NumberOfVolunteersStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfVolunteersStatusAnalyses = NumberOfVolunteersStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.number-of-volunteers-status-analysis.list.list', compact('numberOfVolunteersStatusAnalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-volunteers-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberOfVolunteersStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        return view('admin.gostaresh.number-of-volunteers-status-analysis.edit.edit', compact('numberOfVolunteersStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $numberOfVolunteersStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfVolunteersStatusAnalysis $numberOfVolunteersStatusAnalysis)
    {
        $numberOfVolunteersStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
