<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfResearchProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 7 Controller
class NumberOfResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfResearchProject::query();

        $query = filterByOwnProvince($query);

        $numberOfResearchProjects = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-research-project.list.list', compact('numberOfResearchProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-research-project.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberOfResearchProject::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfResearchProject $numberOfResearchProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfResearchProject $numberOfResearchProject)
    {
        return view('admin.gostaresh.number-of-research-project.edit.edit', compact('numberOfResearchProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberOfResearchProject $numberOfResearchProject)
    {
        $numberOfResearchProject->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfResearchProject $numberOfResearchProject)
    {
        $numberOfResearchProject->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
