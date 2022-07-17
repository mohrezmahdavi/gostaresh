<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\TeachersStatusAnalysis\TeachersStatusAnalysisRequest;
use App\Models\Index\GraduateStatusAnalysis;
use App\Models\Index\TeachersStatusAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

// Table 34 Controller
class TeachersStatusAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $query = TeachersStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = TeachersStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $teachersStatusAnalyses = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.teachers-status-analyses.list.list', compact('teachersStatusAnalyses',
            'yearSelectedList', 'filterColumnsCheckBoxes'));
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
        return view('admin.gostaresh.teachers-status-analyses.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TeachersStatusAnalysisRequest $request
     * @return RedirectResponse
     */
    public function store(TeachersStatusAnalysisRequest $request): RedirectResponse
    {
        TeachersStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return void
     */
    public function show(TeachersStatusAnalysis $teachersStatusAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return Application|Factory|View
     */
    public function edit(TeachersStatusAnalysis $teachersStatusAnalysis): Factory|View|Application
    {
        return view('admin.gostaresh.teachers-status-analyses.edit.edit', compact('teachersStatusAnalysis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeachersStatusAnalysisRequest $request
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return RedirectResponse
     */
    public function update(TeachersStatusAnalysisRequest $request, TeachersStatusAnalysis $teachersStatusAnalysis): RedirectResponse
    {
        $teachersStatusAnalysis->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TeachersStatusAnalysis $teachersStatusAnalysis
     * @return RedirectResponse
     */
    public function destroy(TeachersStatusAnalysis $teachersStatusAnalysis): RedirectResponse
    {
        $teachersStatusAnalysis->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
