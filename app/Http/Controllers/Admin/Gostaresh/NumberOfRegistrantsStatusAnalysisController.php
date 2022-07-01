<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfRegistrantsStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 20 Controller
class NumberOfRegistrantsStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfRegistrantsStatusAnalysises = NumberOfRegistrantsStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.number-of-registrants-status-analysis.list.list', compact('numberOfRegistrantsStatusAnalysises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-registrants-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberOfRegistrantsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfRegistrantsStatusAnalysis $numOfRegistrantsStatusAnalysis)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfRegistrantsStatusAnalysis $numOfRegistrantsStatusAnalysis)
    {
        return view('admin.gostaresh.number-of-registrants-status-analysis.edit.edit', compact('numOfRegistrantsStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfRegistrantsStatusAnalysis $numOfRegistrantsStatusAnalysis)
    {
        $numOfRegistrantsStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfRegistrantsStatusAnalysis $numOfRegistrantsStatusAnalysis)
    {
        dd('ssssssss');
        $numOfRegistrantsStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
