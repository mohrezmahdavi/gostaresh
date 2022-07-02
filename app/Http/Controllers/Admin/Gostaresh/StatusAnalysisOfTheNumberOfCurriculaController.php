<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\StatusAnalysisOfTheNumberOfCurricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusAnalysisOfTheNumberOfCurriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusAnalysisOfTheNumberOfCurriculas = StatusAnalysisOfTheNumberOfCurricula::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.list.list', compact('statusAnalysisOfTheNumberOfCurriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StatusAnalysisOfTheNumberOfCurricula::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-curricula.edit.edit', compact('stsAnalysisOfTheNumOfCurricula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        $stsAnalysisOfTheNumOfCurricula->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusAnalysisOfTheNumberOfCurricula $stsAnalysisOfTheNumOfCurricula)
    {
        $stsAnalysisOfTheNumOfCurricula->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
