<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\UnitsGeneralStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 57 Controller
class UnitsGeneralStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitsGeneralStatuses =  UnitsGeneralStatus::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.units-general-status.list.list', compact('unitsGeneralStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.units-general-status.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UnitsGeneralStatus::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return void
     */
    public function show(UnitsGeneralStatus $unitsGeneralStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitsGeneralStatus $unitsGeneralStatus)
    {
        return view('admin.gostaresh.units-general-status.edit.edit', compact('unitsGeneralStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitsGeneralStatus $unitsGeneralStatus)
    {
        $unitsGeneralStatus->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitsGeneralStatus $unitsGeneralStatus)
    {
        $unitsGeneralStatus->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
