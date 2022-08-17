<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\UniversityCostsPerUnit\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\UniversityCostsPerUnit\UniversityCostsPerUnitRequest;
use App\Models\Index\UniversityCostsPerUnit;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


// Table 52,53 Controller
class UniversityCostsPerUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize("view-any-UniversityCostsPerUnit");

        $query = UniversityCostsPerUnit::whereRequestsQuery();

        $filterColumnsCheckBoxes = UniversityCostsPerUnit::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $universityCosts = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.university-costs-per-unit.list.list', compact('universityCosts'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getUniversityCostsPerUnitRecords()
    {
        return UniversityCostsPerUnit::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $universityCosts = $this->getUniversityCostsPerUnitRecords();
        return Excel::download(new ListExport($universityCosts), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $universityCosts = $this->getUniversityCostsPerUnitRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.university-costs-per-unit.list.pdf', compact('universityCosts'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $universityCosts = $this->getUniversityCostsPerUnitRecords();
        return view('admin.gostaresh.university-costs-per-unit.list.pdf', compact('universityCosts'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize("create-any-UniversityCostsPerUnit");

        return view('admin.gostaresh.university-costs-per-unit.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UniversityCostsPerUnitRequest $request
     * @return RedirectResponse
     */
    public function store(UniversityCostsPerUnitRequest $request)
    {
        $this->authorize("create-any-UniversityCostsPerUnit");

        UniversityCostsPerUnit::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param UniversityCostsPerUnit $universityCostsPerUnit
     * @return void
     */
    public function show(UniversityCostsPerUnit $universityCostsPerUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UniversityCostsPerUnit $universityCostsPerUnit
     * @return Application|Factory|View
     */
    public function edit(UniversityCostsPerUnit $universityCostsPerUnit)
    {
        $this->authorize("edit-any-UniversityCostsPerUnit");

        return view(
            'admin.gostaresh.university-costs-per-unit.edit.edit', compact('universityCostsPerUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UniversityCostsPerUnitRequest $request
     * @param UniversityCostsPerUnit $universityCostsPerUnit
     * @return RedirectResponse
     */
    public function update(UniversityCostsPerUnitRequest $request, UniversityCostsPerUnit $universityCostsPerUnit)
    {
        $this->authorize("edit-any-UniversityCostsPerUnit");

        $universityCostsPerUnit->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UniversityCostsPerUnit $universityCostsPerUnit
     * @return RedirectResponse
     */
    public function destroy(UniversityCostsPerUnit $universityCostsPerUnit)
    {
        $this->authorize("delete-any-UniversityCostsPerUnit");

        $universityCostsPerUnit->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
