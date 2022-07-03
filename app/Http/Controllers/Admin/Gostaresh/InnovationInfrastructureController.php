<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InnovationInfrastructure\TechnologicalProductRequest;
use App\Models\Index\TechnologyAndInnovationInfrastructure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 39 Controller
class InnovationInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $innovationInfrastructures = TechnologyAndInnovationInfrastructure::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.innovation-infrastructures.list.list', compact('innovationInfrastructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.innovation-infrastructures.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TechnologicalProductRequest $request
     * @return RedirectResponse
     */
    public function store(TechnologicalProductRequest $request): RedirectResponse
    {
        TechnologyAndInnovationInfrastructure::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return void
     */
    public function show(TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return Application|Factory|View
     */
    public function edit(TechnologyAndInnovationInfrastructure $innovationInfrastructure): Factory|View|Application
    {
        return view('admin.gostaresh.innovation-infrastructures.edit.edit', compact('innovationInfrastructure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TechnologicalProductRequest $request
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return RedirectResponse
     */
    public function update(TechnologicalProductRequest $request, TechnologyAndInnovationInfrastructure $innovationInfrastructure): RedirectResponse
    {
        $innovationInfrastructure->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return RedirectResponse
     */
    public function destroy(TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        $innovationInfrastructure->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
