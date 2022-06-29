<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\EmploymentOfProvincial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Empty_;
// Table 12 Controller
class EmploymentOfProvincialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employmentOfProvincials = EmploymentOfProvincial::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.employment-of-provincial.list.list', compact('employmentOfProvincials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.employment-of-provincial.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmploymentOfProvincial::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EmploymentOfProvincial $employmentOfProvincial)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EmploymentOfProvincial $employmentOfProvincial)
    {
        return view('admin.gostaresh.employment-of-provincial.edit.edit', compact('employmentOfProvincial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmploymentOfProvincial $employmentOfProvincial)
    {
        $employmentOfProvincial->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmploymentOfProvincial $employmentOfProvincial)
    {
        $employmentOfProvincial->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
