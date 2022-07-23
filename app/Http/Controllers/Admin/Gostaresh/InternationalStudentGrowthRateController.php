<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\InternationalStudentGrowthRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\InternationalStudentGrowthRate\InternationalStudentGrowthRateRequest;

class InternationalStudentGrowthRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = InternationalStudentGrowthRate::query();

        $query = filterByOwnProvince($query);

        $internationalStudentGrowthRates = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.international-student-growth-rate.list.list', compact('internationalStudentGrowthRates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.international-student-growth-rate.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InternationalStudentGrowthRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InternationalStudentGrowthRateRequest $request)
    {
        InternationalStudentGrowthRate::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success',__('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        return view('admin.gostaresh.international-student-growth-rate.edit.edit', compact('internationalStudentGrowthRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InternationalStudentGrowthRateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InternationalStudentGrowthRateRequest $request, InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        $internationalStudentGrowthRate->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternationalStudentGrowthRate $internationalStudentGrowthRate)
    {
        $internationalStudentGrowthRate->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
