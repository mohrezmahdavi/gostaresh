<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfRegistrantsStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfRegistrantsStatusAnalysis\NumberOfRegistrantsStatusAnalysisRequest;

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
        $query = NumberOfRegistrantsStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfRegistrantsStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfRegistrants = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-registrants-status-analysis.list.list', compact('numberOfRegistrants', 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
        return view('admin.gostaresh.number-of-registrants-status-analysis.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfRegistrantsStatusAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfRegistrantsStatusAnalysisRequest $request)
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
    public function show(NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {
        return view('admin.gostaresh.number-of-registrants-status-analysis.edit.edit', compact('numberOfRegistrant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfRegistrantsStatusAnalysisRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfRegistrantsStatusAnalysisRequest $request, NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {
        $numberOfRegistrant->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfRegistrantsStatusAnalysis $numberOfRegistrant)
    {
        $numberOfRegistrant->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
