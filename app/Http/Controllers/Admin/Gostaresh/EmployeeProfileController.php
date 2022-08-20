<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\EmployeeProfile\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\EmployeeProfile\EmployeeProfileRequest;
use App\Models\Index\EmployeeProfile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 45 Controller
class EmployeeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-EmployeeProfile");

        $query = EmployeeProfile::whereRequestsQuery();

        $filterColumnsCheckBoxes = EmployeeProfile::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $employeeProfiles = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.employee-profile.list.list', compact('employeeProfiles'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getEmployeeProfileRecords()
    {
        return EmployeeProfile::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $employeeProfiles = $this->getEmployeeProfileRecords();
        return Excel::download(new ListExport($employeeProfiles), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $employeeProfiles = $this->getEmployeeProfileRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.employee-profile.list.pdf', compact('employeeProfiles'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $employeeProfiles = $this->getEmployeeProfileRecords();
        return view('admin.gostaresh.employee-profile.list.pdf', compact('employeeProfiles'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-EmployeeProfile");

        return view('admin.gostaresh.employee-profile.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EmployeeProfileRequest $request
     * @return Response
     */
    public function store(EmployeeProfileRequest $request)
    {
        $this->authorize("create-any-EmployeeProfile");
        EmployeeProfile::create(array_merge(['user_id' => Auth::id()], $request->validated()));
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
     * @return Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        $this->authorize("edit-any-EmployeeProfile");

        return view(
            'admin.gostaresh.employee-profile.edit.edit', compact('employeeProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EmployeeProfileRequest $request
     * @param EmployeeProfile $employeeProfile
     * @return Response
     */
    public function update(EmployeeProfileRequest $request, EmployeeProfile $employeeProfile)
    {
        $this->authorize("edit-any-EmployeeProfile");
        $employeeProfile->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmployeeProfile $employeeProfile
     * @return Response
     */
    public function destroy(EmployeeProfile $employeeProfile)
    {
        $this->authorize("delete-any-EmployeeProfile");
        $employeeProfile->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
