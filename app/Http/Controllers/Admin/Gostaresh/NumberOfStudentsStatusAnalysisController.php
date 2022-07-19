<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfStudentsStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfStudentsStatusAnalysis\NumberOfStudentsStatusAnalysisRequest;

// Table 16,17 Controller
class NumberOfStudentsStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfStudentsStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfStudentsStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfStudentsStatusAnalysises = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-students-status-analysis.list.list', compact('numberOfStudentsStatusAnalysises', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-students-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfStudentsStatusAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfStudentsStatusAnalysisRequest $request)
    {
        NumberOfStudentsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        return view('admin.gostaresh.number-of-students-status-analysis.edit.edit', compact('numberOfStudentsStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfStudentsStatusAnalysisRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfStudentsStatusAnalysisRequest $request, NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        $numberOfStudentsStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfStudentsStatusAnalysis $numberOfStudentsStatusAnalysis)
    {
        $numberOfStudentsStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
