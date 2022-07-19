<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\UnitsGeneralStatus\UnitsGeneralStatusRequest;
use App\Models\Index\UnitsGeneralStatus;
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
        $query = UnitsGeneralStatus::whereReuqestQuery();

        $filterColumnsCheckBoxes = UnitsGeneralStatus::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $unitsGeneralStatuses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.units-general-status.list.list', compact('unitsGeneralStatuses'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
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
        return view('admin.gostaresh.units-general-status.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UnitsGeneralStatusRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitsGeneralStatusRequest $request)
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
     * @param UnitsGeneralStatusRequest $request
     * @param UnitsGeneralStatus $unitsGeneralStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UnitsGeneralStatusRequest $request, UnitsGeneralStatus $unitsGeneralStatus)
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
