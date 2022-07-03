<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GraduatesOfHigherEducation\GraduatesOfHigherEducationRequest;
use App\Models\Index\GraduatesOfHigherEducationCenters;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 32 Controller
class GraduatesOfHigherEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $graduatesOfHigherEducationCenters = GraduatesOfHigherEducationCenters::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.graduates-of-higher-education.list.list', compact('graduatesOfHigherEducationCenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gostaresh.graduates-of-higher-education.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GraduatesOfHigherEducationRequest $request
     * @return RedirectResponse
     */
    public function store(GraduatesOfHigherEducationRequest $request)
    {
        GraduatesOfHigherEducationCenters::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return void
     */
    public function show(GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return Application|Factory|View
     */
    public function edit(GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        return view('admin.gostaresh.graduates-of-higher-education.edit.edit', compact('graduatesOfHigherEducation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GraduatesOfHigherEducationRequest $request
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return RedirectResponse
     */
    public function update(GraduatesOfHigherEducationRequest $request, GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        $graduatesOfHigherEducation->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return RedirectResponse
     */
    public function destroy(GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        $graduatesOfHigherEducation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
