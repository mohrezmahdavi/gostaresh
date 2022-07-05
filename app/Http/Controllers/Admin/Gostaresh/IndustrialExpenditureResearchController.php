<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\IndustrialExpenditureResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Table 9 Controller
class IndustrialExpenditureResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $industrialExpenditureResearches = IndustrialExpenditureResearch::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.industrial-expenditure-research.list.list', compact('industrialExpenditureResearches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.industrial-expenditure-research.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        IndustrialExpenditureResearch::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        return view('admin.gostaresh.industrial-expenditure-research.edit.edit', compact('industrialExpenditureResearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        $industrialExpenditureResearch->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        $industrialExpenditureResearch->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
