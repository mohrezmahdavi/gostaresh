<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\RevenueChangesTrendsAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 49 Controller
class RevenueChangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenueChanges =  RevenueChangesTrendsAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.revenue-changes.list.list', compact('revenueChanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.revenue-changes.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         RevenueChangesTrendsAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return void
     */
    public function show(RevenueChangesTrendsAnalysis $revenueChange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return \Illuminate\Http\Response
     */
    public function edit(RevenueChangesTrendsAnalysis $revenueChange)
    {
        return view('admin.gostaresh.revenue-changes.edit.edit', compact('revenueChange'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RevenueChangesTrendsAnalysis $revenueChange)
    {
        $revenueChange->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevenueChangesTrendsAnalysis $revenueChange)
    {
        $revenueChange->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
