<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfAdmissionsStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 19 Controller
class NumberOfAdmissionsStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfAdmissionsStatusAnalysises = NumberOfAdmissionsStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.number-of-admissions-status-analysis.list.list', compact('numberOfAdmissionsStatusAnalysises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-admissions-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberOfAdmissionsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        return view('admin.gostaresh.number-of-admissions-status-analysis.edit.edit', compact('numberOfAdmissionsStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        $numberOfAdmissionsStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfAdmissionsStatusAnalysis $numberOfAdmissionsStatusAnalysis)
    {
        $numberOfAdmissionsStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}