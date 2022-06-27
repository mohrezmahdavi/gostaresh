<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\TechnologyAndInnovationInfrastructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 39 Controller
class InnovationInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $innovationInfrastructures = TechnologyAndInnovationInfrastructure::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.innovation-infrastructures.list.list', compact('innovationInfrastructures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.innovation-infrastructures.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * @return \Illuminate\Http\Response
     */
    public function edit(TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        return view('admin.gostaresh.innovation-infrastructures.edit.edit', compact('innovationInfrastructure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        $innovationInfrastructure->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        $innovationInfrastructure->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
