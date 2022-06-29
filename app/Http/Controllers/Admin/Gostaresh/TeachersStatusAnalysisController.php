<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\TeachersStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 34 Controller
class TeachersStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachersStatusAnalysis = TeachersStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.teachers-status-analyses.list.list', compact('teachersStatusAnalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.teachers-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TeachersStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return void
     */
    public function show(TeachersStatusAnalysis $teachersStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(TeachersStatusAnalysis $teachersStatusAnalysis)
    {
        return view('admin.gostaresh.teachers-status-analyses.edit.edit', compact('teachersStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeachersStatusAnalysis $teachersStatusAnalysis)
    {
        $teachersStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeachersStatusAnalysis $teachersStatusAnalysis)
    {
        $teachersStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
