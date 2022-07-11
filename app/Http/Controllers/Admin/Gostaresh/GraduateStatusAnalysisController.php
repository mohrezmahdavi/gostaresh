<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GraduateStatusAnalysis\GraduateStatusAnalysisRequest;
use App\Models\Index\GraduateStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

// Table 33 Controller
class GraduateStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $graduateStatusAnalyses = GraduateStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.graduate-status-analyses.list.list', compact('graduateStatusAnalyses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.graduate-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GraduateStatusAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(GraduateStatusAnalysisRequest $request): RedirectResponse
    {
        GraduateStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return void
     */
    public function show(GraduateStatusAnalysis $graduateStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return Application|Factory|View
     */
    public function edit(GraduateStatusAnalysis $graduateStatusAnalysis): Factory|View|Application
    {
        return view('admin.gostaresh.graduate-status-analyses.edit.edit', compact('graduateStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GraduateStatusAnalysisRequest $request
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return RedirectResponse
     */
    public function update(GraduateStatusAnalysisRequest $request, GraduateStatusAnalysis $graduateStatusAnalysis): RedirectResponse
    {
        $graduateStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GraduateStatusAnalysis $graduateStatusAnalysis
     * @return RedirectResponse
     */
    public function destroy(GraduateStatusAnalysis $graduateStatusAnalysis): RedirectResponse
    {
        $graduateStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
