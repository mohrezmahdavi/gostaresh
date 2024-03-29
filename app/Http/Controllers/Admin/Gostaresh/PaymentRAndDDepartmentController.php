<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\PaymentRAndDDepartment\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\PaymentRAndDDepartment\PaymentRAndDDepartmentRequest;
use App\Models\Index\PaymentRAndDDepartment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 8
class PaymentRAndDDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-PaymentRAndDDepartment");

        $query = PaymentRAndDDepartment::whereRequestsQuery();

        $filterColumnsCheckBoxes = PaymentRAndDDepartment::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $paymentRAndDDepartments = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.payment-r-and-d-department.list.list', compact('paymentRAndDDepartments', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getPaymentRAndDDepartmentRecords()
    {
        return PaymentRAndDDepartment::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $paymentRAndDDepartments = $this->getPaymentRAndDDepartmentRecords();
        return Excel::download(new ListExport($paymentRAndDDepartments), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $paymentRAndDDepartments = $this->getPaymentRAndDDepartmentRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.payment-r-and-d-department.list.pdf', compact('paymentRAndDDepartments'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $paymentRAndDDepartments = $this->getPaymentRAndDDepartmentRecords();
        return view('admin.gostaresh.payment-r-and-d-department.list.pdf', compact('paymentRAndDDepartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-PaymentRAndDDepartment");

        return view('admin.gostaresh.payment-r-and-d-department.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PaymentRAndDDepartmentRequest $request
     * @return Response
     */
    public function store(PaymentRAndDDepartmentRequest $request)
    {
        $this->authorize("create-any-PaymentRAndDDepartment");

        PaymentRAndDDepartment::create([
            'user_id'           => Auth::user()?->id,
            'country_id'        => $request->country_id ?? 1,
            'province_id'       => $request->province_id ?? null,
            'county_id'         => $request->county_id ?? null,
            'city_id'           => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'amount'            => $request->amount_payment_rd ?? 0,
            'year'              => $request->year ?? null,
            'month'             => $request->month ?? null,
        ]);
        // PaymentRAndDDepartment::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        $this->authorize("edit-any-PaymentRAndDDepartment");

        return view(
            'admin.gostaresh.payment-r-and-d-department.edit.edit', compact('paymentRAndDDepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PaymentRAndDDepartmentRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PaymentRAndDDepartmentRequest $request, PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        $this->authorize("edit-any-PaymentRAndDDepartment");

        $paymentRAndDDepartment->update([
            'country_id'        => $request->country_id ?? 1,
            'province_id'       => $request->province_id ?? null,
            'county_id'         => $request->county_id ?? null,
            'city_id'           => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'amount'            => $request->amount_payment_rd ?? 0,
            'year'              => $request->year ?? null,
            'month'             => $request->month ?? null,
        ]);
        // $paymentRAndDDepartment->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(PaymentRAndDDepartment $paymentRAndDDepartment)
    {
        $this->authorize("delete-any-PaymentRAndDDepartment");
        $paymentRAndDDepartment->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
