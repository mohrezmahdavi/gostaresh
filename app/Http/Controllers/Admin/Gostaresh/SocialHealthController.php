<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\SocialHealthStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 43 Controller
class SocialHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socialHealths =  SocialHealthStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.social-health.list.list', compact('socialHealths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.social-health.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         SocialHealthStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return void
     */
    public function show( SocialHealthStatusAnalysis $socialHealth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return \Illuminate\Http\Response
     */
    public function edit( SocialHealthStatusAnalysis $socialHealth)
    {
        return view('admin.gostaresh.social-health.edit.edit', compact('socialHealth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  SocialHealthStatusAnalysis $socialHealth)
    {
        $socialHealth->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return \Illuminate\Http\Response
     */
    public function destroy( SocialHealthStatusAnalysis $socialHealth)
    {
        $socialHealth->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
