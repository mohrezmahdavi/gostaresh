<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InternationalResearchStatusAnalysis\InternationalResearchStatusAnalysisRequest;
use App\Models\Index\InternationalResearchStatusAnalysis;
use App\Models\Index\ResearchOutputStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

// Table 36,37 Controller
class InternationalResearchStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $query = InternationalResearchStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = InternationalResearchStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $internationalResearchStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.international-research-status-analyses.list.list', compact(
            'internationalResearchStatusAnalyses', "filterColumnsCheckBoxes", "yearSelectedList"));
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
        return view('admin.gostaresh.international-research-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InternationalResearchStatusAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(InternationalResearchStatusAnalysisRequest $request): RedirectResponse
    {
        InternationalResearchStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearchStatusAnalysis
     * @return void
     */
    public function show(InternationalResearchStatusAnalysis $internationalResearchStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return Application|Factory|View
     */
    public function edit(InternationalResearchStatusAnalysis $internationalResearch): Factory|View|Application
    {
        return view('admin.gostaresh.international-research-status-analyses.edit.edit', compact('internationalResearch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InternationalResearchStatusAnalysisRequest $request
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return RedirectResponse
     */
    public function update(InternationalResearchStatusAnalysisRequest $request, InternationalResearchStatusAnalysis $internationalResearch): RedirectResponse
    {
        $internationalResearch->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param InternationalResearchStatusAnalysis $internationalResearch
     * @return RedirectResponse
     */
    public function destroy(InternationalResearchStatusAnalysis $internationalResearch): RedirectResponse
    {
        $internationalResearch->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
