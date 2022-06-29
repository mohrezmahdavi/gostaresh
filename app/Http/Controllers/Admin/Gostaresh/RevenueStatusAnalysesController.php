<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\RevenueStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 48 Controller
class RevenueStatusAnalysesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenueStatusAnalysis =  RevenueStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.revenue-status-analyses.list.list', compact('revenueStatusAnalysis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.revenue-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         RevenueStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return void
     */
    public function show(RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        return view('admin.gostaresh.revenue-status-analyses.edit.edit', compact('revenueStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        $revenueStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RevenueStatusAnalysis $revenueStatusAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevenueStatusAnalysis $revenueStatusAnalysis)
    {
        $revenueStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
