<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\EconomicParticipationRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\EconomicParticipationRate\EconomicParticipationRateRequest;
// Table 10 Controller
class EconomicParticipationRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = EconomicParticipationRate::whereRequestsQuery();

        $filterColumnsCheckBoxes = EconomicParticipationRate::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $economicParticipationRates = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.economic-participation-rate.list.list', compact('economicParticipationRates', 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
        return view('admin.gostaresh.economic-participation-rate.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EconomicParticipationRateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EconomicParticipationRateRequest $request)
    {
        EconomicParticipationRate::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EconomicParticipationRate $economicParticipationRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EconomicParticipationRate $economicParticipationRate)
    {
        return view('admin.gostaresh.economic-participation-rate.edit.edit', compact('economicParticipationRate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EconomicParticipationRateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EconomicParticipationRateRequest $request, EconomicParticipationRate $economicParticipationRate)
    {
        $economicParticipationRate->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EconomicParticipationRate $economicParticipationRate)
    {
        $economicParticipationRate->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
