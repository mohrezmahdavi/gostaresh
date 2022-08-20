<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\GraduatesOfHigherEducation\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GraduatesOfHigherEducation\GraduatesOfHigherEducationRequest;
use App\Models\Index\GraduatesOfHigherEducationCenters;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 32 Controller
class GraduatesOfHigherEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize("view-any-GraduatesOfHigherEducationCenters");

        $query = GraduatesOfHigherEducationCenters::whereRequestsQuery();

        $filterColumnsCheckBoxes = GraduatesOfHigherEducationCenters::$filterColumnsCheckBoxes;

        $query = filterByOwnProvince($query);

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $graduatesOfHigherEducationCenters = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.graduates-of-higher-education.list.list', compact('graduatesOfHigherEducationCenters',
            'yearSelectedList', 'filterColumnsCheckBoxes'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getGraduatesOfHigherEducationCentersRecords()
    {
        return GraduatesOfHigherEducationCenters::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $graduatesOfHigherEducationCenters = $this->getGraduatesOfHigherEducationCentersRecords();
        return Excel::download(new ListExport($graduatesOfHigherEducationCenters), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $graduatesOfHigherEducationCenters = $this->getGraduatesOfHigherEducationCentersRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.graduates-of-higher-education.list.pdf', compact('graduatesOfHigherEducationCenters'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $graduatesOfHigherEducationCenters = $this->getGraduatesOfHigherEducationCentersRecords();
        return view('admin.gostaresh.graduates-of-higher-education.list.pdf', compact('graduatesOfHigherEducationCenters'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize("create-any-GraduatesOfHigherEducationCenters");

        return view('admin.gostaresh.graduates-of-higher-education.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GraduatesOfHigherEducationRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(GraduatesOfHigherEducationRequest $request)
    {
        $this->authorize("create-any-GraduatesOfHigherEducationCenters");
        GraduatesOfHigherEducationCenters::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return void
     */
    public function show(GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return Application|Factory|View
     */
    public function edit(GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        $this->authorize("edit-any-GraduatesOfHigherEducationCenters");

        return view(
            'admin.gostaresh.graduates-of-higher-education.edit.edit', compact('graduatesOfHigherEducation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GraduatesOfHigherEducationRequest $request
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return RedirectResponse
     */
    public function update(GraduatesOfHigherEducationRequest $request, GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        $this->authorize("edit-any-GraduatesOfHigherEducationCenters");
        $graduatesOfHigherEducation->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GraduatesOfHigherEducationCenters $graduatesOfHigherEducation
     * @return RedirectResponse
     */
    public function destroy(GraduatesOfHigherEducationCenters $graduatesOfHigherEducation)
    {
        $this->authorize("delete-any-GraduatesOfHigherEducationCenters");
        $graduatesOfHigherEducation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
