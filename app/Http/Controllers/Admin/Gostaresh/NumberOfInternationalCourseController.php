<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfInternationalCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfInternationalCourse\NumberOfInternationalCourseRequest;
// Table 29 Controller
class NumberOfInternationalCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfInternationalCourse::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfInternationalCourse::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfInternationalCourses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-international-course.list.list', compact('numberOfInternationalCourses',, 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
        return view('admin.gostaresh.number-of-international-course.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfInternationalCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfInternationalCourseRequest $request)
    {
        NumberOfInternationalCourse::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        return view('admin.gostaresh.number-of-international-course.edit.edit', compact('numberOfInternationalCourse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfInternationalCourseRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfInternationalCourseRequest $request, NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        $numberOfInternationalCourse->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfInternationalCourse $numberOfInternationalCourse)
    {
        $numberOfInternationalCourse->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
