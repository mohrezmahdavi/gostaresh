<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\TuitionIncome\TuitionIncomeRequest;
use App\Models\Index\AverageTuitionIncome;
use Illuminate\Support\Facades\Auth;

// Table 50 Controller
class TuitionIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuitionIncome =  AverageTuitionIncome::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.tuition-income.list.list', compact('tuitionIncome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.tuition-income.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TuitionIncomeRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TuitionIncomeRequest $request)
    {
         AverageTuitionIncome::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param AverageTuitionIncome $tuitionIncome
     * @return void
     */
    public function show(AverageTuitionIncome $tuitionIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AverageTuitionIncome $tuitionIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(AverageTuitionIncome $tuitionIncome)
    {
        return view('admin.gostaresh.tuition-income.edit.edit', compact('tuitionIncome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TuitionIncomeRequest $request
     * @param AverageTuitionIncome $tuitionIncome
     * @return \Illuminate\Http\Response
     */
    public function update(TuitionIncomeRequest $request, AverageTuitionIncome $tuitionIncome)
    {
        $tuitionIncome->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AverageTuitionIncome $tuitionIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(AverageTuitionIncome $tuitionIncome)
    {
        $tuitionIncome->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
