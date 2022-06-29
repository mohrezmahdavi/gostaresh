<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\CulturalIndicatorsStatusAnalysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 42 Controller
class CulturalIndicatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $culturalIndicators =  CulturalIndicatorsStatusAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.cultural-indicators.list.list', compact('culturalIndicators'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.cultural-indicators.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         CulturalIndicatorsStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return void
     */
    public function show( CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return \Illuminate\Http\Response
     */
    public function edit( CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        return view('admin.gostaresh.cultural-indicators.edit.edit', compact('culturalIndicator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        $culturalIndicator->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CulturalIndicatorsStatusAnalysis $culturalIndicator
     * @return \Illuminate\Http\Response
     */
    public function destroy( CulturalIndicatorsStatusAnalysis $culturalIndicator)
    {
        $culturalIndicator->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}