<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\AmountOfFacilitiesForResearchAchievements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 38 Controller
class AmountOfFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amountOfFacilities = AmountOfFacilitiesForResearchAchievements::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.amount-of-facilities.list.list', compact('amountOfFacilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.amount-of-facilities.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AmountOfFacilitiesForResearchAchievements::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return void
     */
    public function show(AmountOfFacilitiesForResearchAchievements $amountOfFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(AmountOfFacilitiesForResearchAchievements $amountOfFacility)
    {
        return view('admin.gostaresh.amount-of-facilities.edit.edit', compact('amountOfFacility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmountOfFacilitiesForResearchAchievements $amountOfFacility)
    {
        $amountOfFacility->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmountOfFacilitiesForResearchAchievements $amountOfFacility)
    {
        $amountOfFacility->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
