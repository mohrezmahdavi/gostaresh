<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\OrganizationalCultureStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 44 Controller
class OrganizationalCultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizationalCultures =  OrganizationalCultureStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.organizational-culture.list.list', compact('organizationalCultures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.organizational-culture.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         OrganizationalCultureStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return void
     */
    public function show(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        return view('admin.gostaresh.organizational-culture.edit.edit', compact('organizationalCulture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $organizationalCulture->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $organizationalCulture->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
