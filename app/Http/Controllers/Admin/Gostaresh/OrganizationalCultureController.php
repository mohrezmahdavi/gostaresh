<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\OrganizationalCulture\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\OrganizationalCulture\OrganizationalCultureRequest;
use App\Models\Index\OrganizationalCultureStatusAnalysis;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


// Table 44 Controller
class OrganizationalCultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-OrganizationalCultureStatusAnalysis");

        $query = OrganizationalCultureStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = OrganizationalCultureStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $organizationalCultures = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.organizational-culture.list.list', compact('organizationalCultures'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getOrganizationalCultureRecords()
    {
        return OrganizationalCultureStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $organizationalCultures = $this->getOrganizationalCultureRecords();
        return Excel::download(new ListExport($organizationalCultures), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $organizationalCultures = $this->getOrganizationalCultureRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.organizational-culture.list.pdf', compact('organizationalCultures'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $organizationalCultures = $this->getOrganizationalCultureRecords();
        return view('admin.gostaresh.organizational-culture.list.pdf', compact('organizationalCultures'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-OrganizationalCultureStatusAnalysis");

        return view('admin.gostaresh.organizational-culture.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrganizationalCultureRequest $request
     * @return Response
     */
    public function store(OrganizationalCultureRequest $request)
    {
        $this->authorize("create-any-OrganizationalCultureStatusAnalysis");

        OrganizationalCultureStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return void
     */
    public function show(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return Response
     */
    public function edit(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $this->authorize("edit-any-OrganizationalCultureStatusAnalysis");

        return view(
            'admin.gostaresh.organizational-culture.edit.edit', compact('organizationalCulture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrganizationalCultureRequest $request
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return Response
     */
    public function update(OrganizationalCultureRequest $request, OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $this->authorize("edit-any-OrganizationalCultureStatusAnalysis");
        $organizationalCulture->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return Response
     */
    public function destroy(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $this->authorize("delete-any-OrganizationalCultureStatusAnalysis");
        $organizationalCulture->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
