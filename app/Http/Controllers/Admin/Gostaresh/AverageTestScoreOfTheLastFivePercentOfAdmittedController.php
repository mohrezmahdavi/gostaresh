<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\AverageTestScoreOfTheLastFivePercentOfAdmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 23 Controller
class AverageTestScoreOfTheLastFivePercentOfAdmittedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $averageTestScoreOfTheLastFivePercentOfAdmitteds = AverageTestScoreOfTheLastFivePercentOfAdmitted::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.list.list', compact('averageTestScoreOfTheLastFivePercentOfAdmitteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AverageTestScoreOfTheLastFivePercentOfAdmitted::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AverageTestScoreOfTheLastFivePercentOfAdmitted $averageTestScoreOfTheLastFivePercentOfAdmitted)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AverageTestScoreOfTheLastFivePercentOfAdmitted $averageTestScoreOfTheLastFivePercentOfAdmitted)
    {
        return view('admin.gostaresh.average-test-score-of-the-last-five-percent-of-admitted.edit.edit', compact('averageTestScoreOfTheLastFivePercentOfAdmitted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AverageTestScoreOfTheLastFivePercentOfAdmitted $averageTestScoreOfTheLastFivePercentOfAdmitted)
    {
        $averageTestScoreOfTheLastFivePercentOfAdmitted->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AverageTestScoreOfTheLastFivePercentOfAdmitted $averageTestScoreOfTheLastFivePercentOfAdmitted)
    {
        $averageTestScoreOfTheLastFivePercentOfAdmitted->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
