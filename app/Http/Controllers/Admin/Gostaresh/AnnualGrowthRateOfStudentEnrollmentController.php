<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\AnnualGrowthRateOfStudentEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Table 21 Controller
class AnnualGrowthRateOfStudentEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = AnnualGrowthRateOfStudentEnrollment::query();

        $query = filterByOwnProvince($query);

        $annualGrowthRateOfStudentEnrollments = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.annual-growth-rate-of-student-enrollment.list.list', compact('annualGrowthRateOfStudentEnrollments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.annual-growth-rate-of-student-enrollment.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AnnualGrowthRateOfStudentEnrollment::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {
        return view('admin.gostaresh.annual-growth-rate-of-student-enrollment.edit.edit', compact('annualGrthRateOfStdnEnrollment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {
        $annualGrthRateOfStdnEnrollment->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnnualGrowthRateOfStudentEnrollment $annualGrthRateOfStdnEnrollment)
    {
        $annualGrthRateOfStdnEnrollment->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
