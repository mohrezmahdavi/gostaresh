<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\GraduateStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 33 Controller
class GraduateStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graduateStatusAnalysis = GraduateStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.graduate-status-analyses.list.list', compact('graduateStatusAnalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.graduate-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GraduateStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return void
     */
    public function show(GraduateStatusAnalysis $graduateStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(GraduateStatusAnalysis $graduateStatusAnalysis)
    {
        return view('admin.gostaresh.graduate-status-analyses.edit.edit', compact('graduateStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GraduateStatusAnalysis $graduateStatusAnalysis)
    {
        $graduateStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GraduateStatusAnalysis $graduateStatusAnalysis)
    {
        $graduateStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
