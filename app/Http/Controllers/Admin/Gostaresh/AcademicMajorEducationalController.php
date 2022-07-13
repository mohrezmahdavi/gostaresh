<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\AcademicMajorEducational;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\AcademicMajorEducational\AcademicMajorEducationalRequest;

// Table 15 Controller
class AcademicMajorEducationalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = AcademicMajorEducational::query();

        $query = filterByOwnProvince($query);

        $academicMajorEducationals = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.academic-major-educational.list.list', compact('academicMajorEducationals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.academic-major-educational.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AcademicMajorEducationalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AcademicMajorEducationalRequest $request)
    {
        AcademicMajorEducational::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicMajorEducational $academicMajorEducational)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicMajorEducational $academicMajorEducational)
    {
        return view('admin.gostaresh.academic-major-educational.edit.edit', compact('academicMajorEducational'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AcademicMajorEducationalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AcademicMajorEducationalRequest $request, AcademicMajorEducational $academicMajorEducational)
    {
        $academicMajorEducational->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicMajorEducational $academicMajorEducational)
    {
        $academicMajorEducational->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
