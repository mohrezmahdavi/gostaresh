<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\AverageTestScoreOfTheFirstThirtyPercentOfAdmitted\AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest;

// Table 22 Controller
class AverageTestScoreOfTheFirstThirtyPercentOfAdmittedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::whereRequestsQuery();

        $filterColumnsCheckBoxes = AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $averageTestScoreOfTheFirstThirtyPercentOfAdmitteds = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.list.list', compact('averageTestScoreOfTheFirstThirtyPercentOfAdmitteds', 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request)
    {
        AverageTestScoreOfTheFirstThirtyPercentOfAdmitted::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        return view('admin.gostaresh.average-test-score-of-the-first-thirty-percent-of-admitted.edit.edit', compact('avgTstScrOfFrtThrtPrntOfAdmitted'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AverageTestScoreOfTheFirstThirtyPercentOfAdmittedRequest $request, AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        $avgTstScrOfFrtThrtPrntOfAdmitted->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AverageTestScoreOfTheFirstThirtyPercentOfAdmitted $avgTstScrOfFrtThrtPrntOfAdmitted)
    {
        $avgTstScrOfFrtThrtPrntOfAdmitted->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
