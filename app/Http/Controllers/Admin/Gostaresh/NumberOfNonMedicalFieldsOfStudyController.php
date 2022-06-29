<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfNonMedicalFieldsOfStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Table 26,27 Controller
class NumberOfNonMedicalFieldsOfStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberOfNonMedicalFieldsOfStudies = NumberOfNonMedicalFieldsOfStudy::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.number-of-non-medical-fields-of-study.list.list', compact('numberOfNonMedicalFieldsOfStudies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-non-medical-fields-of-study.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberOfNonMedicalFieldsOfStudy::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        return view('admin.gostaresh.number-of-non-medical-fields-of-study.edit.edit', compact('numberOfNonMedicalFieldsOfStudy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        $numberOfNonMedicalFieldsOfStudy->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfNonMedicalFieldsOfStudy $numberOfNonMedicalFieldsOfStudy)
    {
        $numberOfNonMedicalFieldsOfStudy->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
