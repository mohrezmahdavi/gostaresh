<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfInternationalCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $numberOfInternationalCourses = NumberOfInternationalCourse::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.number-of-international-course.list.list', compact('numberOfInternationalCourses'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfInternationalCourse $numberOfInternationalCourse)
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