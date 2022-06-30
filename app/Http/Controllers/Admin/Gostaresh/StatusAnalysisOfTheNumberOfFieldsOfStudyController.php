<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\StatusAnalysisOfTheNumberOfFieldsOfStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use phpDocumentor\Reflection\DocBlock\Tags\See;

// Table 25 Controller
class StatusAnalysisOfTheNumberOfFieldsOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusAnalysisOfTheNumberOfFieldsOfStudies = StatusAnalysisOfTheNumberOfFieldsOfStudy::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.list.list', compact('statusAnalysisOfTheNumberOfFieldsOfStudies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StatusAnalysisOfTheNumberOfFieldsOfStudy::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StatusAnalysisOfTheNumberOfFieldsOfStudy $stsAnlysOfTheNumOfFieldsOfStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusAnalysisOfTheNumberOfFieldsOfStudy $stsAnlysOfTheNumOfFieldsOfStudy)
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-fields-of-study.edit.edit', compact('stsAnlysOfTheNumOfFieldsOfStudy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusAnalysisOfTheNumberOfFieldsOfStudy $stsAnlysOfTheNumOfFieldsOfStudy)
    {
        $stsAnlysOfTheNumOfFieldsOfStudy->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusAnalysisOfTheNumberOfFieldsOfStudy $stsAnlysOfTheNumOfFieldsOfStudy)
    {
        $stsAnlysOfTheNumOfFieldsOfStudy->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
