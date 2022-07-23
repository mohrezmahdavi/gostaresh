<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AmountOfFacilities\AmountOfFacilitiesRequest;
use App\Models\Index\AmountOfFacilitiesForResearchAchievements;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        $query = AmountOfFacilitiesForResearchAchievements::whereRequestsQuery();

        $filterColumnsCheckBoxes = AmountOfFacilitiesForResearchAchievements::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $amountOfFacilities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.amount-of-facilities.list.list', compact('amountOfFacilities'
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
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.amount-of-facilities.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AmountOfFacilitiesRequest $request
     * @return RedirectResponse
     */
    public function store(AmountOfFacilitiesRequest $request): RedirectResponse
    {
        AmountOfFacilitiesForResearchAchievements::create(array_merge(['user_id' => Auth::id()], $request->validated()));
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
     * @param AmountOfFacilitiesRequest $request
     * @param AmountOfFacilitiesForResearchAchievements $amountOfFacility
     * @return RedirectResponse
     */
    public function update(AmountOfFacilitiesRequest $request, AmountOfFacilitiesForResearchAchievements $amountOfFacility): RedirectResponse
    {
        $amountOfFacility->update($request->validated());
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
