<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\EmployeeProfile\EmployeeProfileRequest;
use App\Models\Index\EmployeeProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 45 Controller
class EmployeeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeProfiles =  EmployeeProfile::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.employee-profile.list.list', compact('employeeProfiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.employee-profile.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeProfileRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeProfileRequest $request)
    {
         EmployeeProfile::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param EmployeeProfile $employeeProfile
     * @return void
     */
    public function show(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EmployeeProfile $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        return view('admin.gostaresh.employee-profile.edit.edit', compact('employeeProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeProfileRequest $request
     * @param EmployeeProfile $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeProfileRequest $request, EmployeeProfile $employeeProfile)
    {
        $employeeProfile->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmployeeProfile $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeProfile $employeeProfile)
    {
        $employeeProfile->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
