<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\PaymentRAndDDepartment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 8
class PaymentRAndDDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentRAndDDepartments = PaymentRAndDDepartment::orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.payment-r-and-d-department.list.list', compact('paymentRAndDDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.payment-r-and-d-department.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PaymentRAndDDepartment::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        return view('admin.gostaresh.payment-r-and-d-department.edit.edit', compact('paymentRAndDDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        $paymentRAndDDepartment->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        $paymentRAndDDepartment->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
