<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\StatusAnalysisOfTheNumberOfCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\StatusAnalysisOfTheNumberOfCourse\StatusAnalysisOfTheNumberOfCourseRequest;

// Table 28 Controller
class StatusAnalysisOfTheNumberOfCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = StatusAnalysisOfTheNumberOfCourse::whereRequestsQuery();

        $filterColumnsCheckBoxes = StatusAnalysisOfTheNumberOfCourse::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $statusAnalysisOfTheNumberOfCourses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.status-analysis-of-the-number-of-courses.list.list', compact('statusAnalysisOfTheNumberOfCourses', 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
        return view('admin.gostaresh.status-analysis-of-the-number-of-courses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StatusAnalysisOfTheNumberOfCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusAnalysisOfTheNumberOfCourseRequest $request)
    {
        StatusAnalysisOfTheNumberOfCourse::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StatusAnalysisOfTheNumberOfCourse $statusAnalysisOfTheNumOfCourse)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusAnalysisOfTheNumberOfCourse $statusAnalysisOfTheNumOfCourse)
    {
        return view('admin.gostaresh.status-analysis-of-the-number-of-courses.edit.edit', compact('statusAnalysisOfTheNumOfCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StatusAnalysisOfTheNumberOfCourseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusAnalysisOfTheNumberOfCourseRequest $request, StatusAnalysisOfTheNumberOfCourse $statusAnalysisOfTheNumOfCourse)
    {
        $statusAnalysisOfTheNumOfCourse->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusAnalysisOfTheNumberOfCourse $statusAnalysisOfTheNumOfCourse)
    {
        $statusAnalysisOfTheNumOfCourse->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
