<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AmountOfFacilities\InnovationInfrastructureRequest;
use App\Models\Index\AmountOfFacilitiesForResearchAchievements;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 38 Controller
class AmountOfFacilitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $amountOfFacilities = AmountOfFacilitiesForResearchAchievements::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.amount-of-facilities.list.list', compact('amountOfFacilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.amount-of-facilities.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InnovationInfrastructureRequest $request
     * @return RedirectResponse
     */
    public function store(InnovationInfrastructureRequest $request): RedirectResponse
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
     * @return Application|Factory|View
     */
    public function edit(AmountOfFacilitiesForResearchAchievements $amountOfFacility): Factory|View|Application
    {
        return view('admin.gostaresh.amount-of-facilities.edit.edit', compact('amountOfFacility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InnovationInfrastructureRequest $request
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return RedirectResponse
     */
    public function update(InnovationInfrastructureRequest $request, AmountOfFacilitiesForResearchAchievements $amountOfFacility): RedirectResponse
    {
        $amountOfFacility->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return RedirectResponse
     */
    public function destroy(AmountOfFacilitiesForResearchAchievements $amountOfFacility): RedirectResponse
    {
        $amountOfFacility->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
