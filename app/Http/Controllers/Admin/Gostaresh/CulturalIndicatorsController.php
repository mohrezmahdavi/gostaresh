<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\CulturalIndicators\CulturalIndicatorsRequest;
use App\Models\Index\CulturalIndicatorsStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

// Table 42 Controller
class CulturalIndicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        
        $query = CulturalIndicatorsStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = CulturalIndicatorsStatusAnalysis::$filterColumnsCheckBoxes;
        
        $yearSelectedList = $this->yearSelectedList(clone $query);
        
        $query = filterByOwnProvince($query);
        
        $culturalIndicators = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.cultural-indicators.list.list', compact('culturalIndicators'
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
    public function create()
    {
        return view('admin.gostaresh.cultural-indicators.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CulturalIndicatorsRequest $request
     * @return RedirectResponse
     */
    public function store(CulturalIndicatorsRequest $request)
    {
         CulturalIndicatorsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return void
     */
    public function show( CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return Application|Factory|View
     */
    public function edit(CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        return view('admin.gostaresh.cultural-indicators.edit.edit', compact('culturalIndicator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CulturalIndicatorsRequest $request
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return RedirectResponse
     */
    public function update(CulturalIndicatorsRequest $request, CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        $culturalIndicator->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return RedirectResponse
     */
    public function destroy( CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        $culturalIndicator->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
