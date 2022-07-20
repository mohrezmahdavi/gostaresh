<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\CostOfMajors\CostOfMajorsRequest;
use App\Models\Index\AverageCostOfMajor;
use Illuminate\Support\Facades\Auth;

// Table 55 Controller
class CostOfMajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = AverageCostOfMajor::whereRequestsQuery();

        $filterColumnsCheckBoxes = AverageCostOfMajor::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $costOfMajors = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.cost-of-majors.list.list', compact('costOfMajors'
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
        return view('admin.gostaresh.cost-of-majors.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CostOfMajorsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostOfMajorsRequest $request)
    {
        AverageCostOfMajor::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param AverageCostOfMajor $costOfMajor
     * @return void
     */
    public function show(AverageCostOfMajor $costOfMajor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AverageCostOfMajor $costOfMajor
     * @return \Illuminate\Http\Response
     */
    public function edit(AverageCostOfMajor $costOfMajor)
    {
        return view('admin.gostaresh.cost-of-majors.edit.edit', compact('costOfMajor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CostOfMajorsRequest $request
     * @param AverageCostOfMajor $costOfMajor
     * @return \Illuminate\Http\Response
     */
    public function update(CostOfMajorsRequest $request, AverageCostOfMajor $costOfMajor)
    {
        $costOfMajor->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AverageCostOfMajor $costOfMajor
     * @return \Illuminate\Http\Response
     */
    public function destroy(AverageCostOfMajor $costOfMajor)
    {
        $costOfMajor->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
