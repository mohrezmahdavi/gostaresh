<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\ResearchOutputStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 35 Controller
class ResearchOutputStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $researchOutputStatusAnalyses = ResearchOutputStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.research-output-status-analyses.list.list', compact('researchOutputStatusAnalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.research-output-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        ResearchOutputStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param ResearchOutputStatusAnalysis $ResearchOutputStatusAnalysis
     * @return void
     */
    public function show(ResearchOutputStatusAnalysis $ResearchOutputStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return Application|Factory|View
     */
    public function edit(ResearchOutputStatusAnalysis $researchOutputStatusAnalysis): Factory|View|Application
    {
        return view('admin.gostaresh.research-output-status-analyses.edit.edit', compact('researchOutputStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return RedirectResponse
     */
    public function update(Request $request, ResearchOutputStatusAnalysis $researchOutputStatusAnalysis): RedirectResponse
    {
        $researchOutputStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ResearchOutputStatusAnalysis $researchOutputStatusAnalysis
     * @return RedirectResponse
     */
    public function destroy(ResearchOutputStatusAnalysis $researchOutputStatusAnalysis): RedirectResponse
    {
        $researchOutputStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
