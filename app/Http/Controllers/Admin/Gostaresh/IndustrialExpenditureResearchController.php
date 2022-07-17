<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\IndustrialExpenditureResearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\IndustrialExpenditureResearch\IndustrialExpenditureResearchRequest;


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
        $query = IndustrialExpenditureResearch::whereRequestsQuery();

        $filterColumnsCheckBoxes = IndustrialExpenditureResearch::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $industrialExpenditureResearches = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.industrial-expenditure-research.list.list', compact('industrialExpenditureResearches', 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
        return view('admin.gostaresh.industrial-expenditure-research.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IndustrialExpenditureResearchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustrialExpenditureResearchRequest $request)
    {
        IndustrialExpenditureResearch::create([
            'user_id' => Auth::user()?->id,
            'country_id' => $request->country_id ?? 1,
            'province_id' => $request->province_id ?? null,
            'county_id' => $request->county_id ?? null,
            'city_id' => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'amount' => $request->amount_payment_rd ?? 0,
            'year' => $request->year ?? null,
            'month' => $request->month ?? null,
        ]);
        // IndustrialExpenditureResearch::create(array_merge(['user_id' => Auth::id()], $request->all()));
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
     * @param  IndustrialExpenditureResearchRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IndustrialExpenditureResearchRequest $request, IndustrialExpenditureResearch $industrialExpenditureResearch)
    {
        $industrialExpenditureResearch->update([
            'country_id' => $request->country_id ?? 1,
            'province_id' => $request->province_id ?? null,
            'county_id' => $request->county_id ?? null,
            'city_id' => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'amount' => $request->amount_payment_rd ?? 0,
            'year' => $request->year ?? null,
            'month' => $request->month ?? null,
        ]);
        // $industrialExpenditureResearch->update($request->all());
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
