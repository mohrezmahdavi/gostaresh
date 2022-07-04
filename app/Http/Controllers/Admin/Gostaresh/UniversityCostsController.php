<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\UniversityCosts\UniversityCostsRequest;
use App\Models\Index\UniversityCostsAnalysis;
use Illuminate\Support\Facades\Auth;

// Table 52,53 Controller
class UniversityCostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universityCosts =  UniversityCostsAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.university-costs.list.list', compact('universityCosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.university-costs.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UniversityCostsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UniversityCostsRequest $request)
    {
         UniversityCostsAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param UniversityCostsAnalysis $universityCost
     * @return void
     */
    public function show(UniversityCostsAnalysis $universityCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UniversityCostsAnalysis $universityCost
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityCostsAnalysis $universityCost)
    {
        return view('admin.gostaresh.university-costs.edit.edit', compact('universityCost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UniversityCostsRequest $request
     * @param UniversityCostsAnalysis $universityCost
     * @return \Illuminate\Http\Response
     */
    public function update(UniversityCostsRequest $request, UniversityCostsAnalysis $universityCost)
    {
        $universityCost->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UniversityCostsAnalysis $universityCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(UniversityCostsAnalysis $universityCost)
    {
        $universityCost->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
