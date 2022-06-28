<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\CostChangesTrendsAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 54 Controller
class CostChangesTrendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costChangesTrends =  CostChangesTrendsAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.cost-changes-trends.list.list', compact('costChangesTrends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.cost-changes-trends.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         CostChangesTrendsAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return void
     */
    public function show(CostChangesTrendsAnalysis $costChangesTrend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return \Illuminate\Http\Response
     */
    public function edit(CostChangesTrendsAnalysis $costChangesTrend)
    {
        return view('admin.gostaresh.cost-changes-trends.edit.edit', compact('costChangesTrend'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CostChangesTrendsAnalysis $costChangesTrend)
    {
        $costChangesTrend->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CostChangesTrendsAnalysis $costChangesTrend
     * @return \Illuminate\Http\Response
     */
    public function destroy(CostChangesTrendsAnalysis $costChangesTrend)
    {
        $costChangesTrend->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
