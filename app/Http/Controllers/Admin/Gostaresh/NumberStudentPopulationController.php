<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\NumberStudentPopulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Table 3 Controller
class NumberStudentPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $numberStudentPopulations = NumberStudentPopulation::orderBy('id', 'DESC')->paginate(20);
        return view('admin.gostaresh.number-student-population.list.list', compact('numberStudentPopulations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-student-population.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        NumberStudentPopulation::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberStudentPopulation $numberStudentPopulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberStudentPopulation $numberStudentPopulation)
    {
        return view('admin.gostaresh.number-student-population.edit.edit', compact('numberStudentPopulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberStudentPopulation $numberStudentPopulation)
    {
        $numberStudentPopulation->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberStudentPopulation $numberStudentPopulation)
    {
        $numberStudentPopulation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
