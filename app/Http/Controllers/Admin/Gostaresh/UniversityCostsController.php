<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\UniversityCosts\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\UniversityCosts\UniversityCostsRequest;
use App\Models\Index\UniversityCostsAnalysis;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


// Table 52,53 Controller
class UniversityCostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-UniversityCostsAnalysis");

        $query = UniversityCostsAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = UniversityCostsAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $universityCosts = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.university-costs.list.list', compact('universityCosts'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getUniversityCostsAnalysisRecords()
    {
        return UniversityCostsAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $universityCosts = $this->getUniversityCostsAnalysisRecords();
        return Excel::download(new ListExport($universityCosts), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $universityCosts = $this->getUniversityCostsAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.university-costs.list.pdf', compact('universityCosts'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $universityCosts = $this->getUniversityCostsAnalysisRecords();
        return view('admin.gostaresh.university-costs.list.pdf', compact('universityCosts'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-UniversityCostsAnalysis");

        return view('admin.gostaresh.university-costs.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UniversityCostsRequest $request
     * @return Response
     */
    public function store(UniversityCostsRequest $request)
    {
        $this->authorize("create-any-UniversityCostsAnalysis");

        UniversityCostsAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param UniversityCostsAnalysis $universityCost
     * @return void
     */
    public function show(UniversityCostsAnalysis $universityCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UniversityCostsAnalysis $universityCost
     * @return Response
     */
    public function edit(UniversityCostsAnalysis $universityCost)
    {
        $this->authorize("edit-any-UniversityCostsAnalysis");

        return view(
            'admin.gostaresh.university-costs.edit.edit', compact('universityCost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UniversityCostsRequest $request
     * @param UniversityCostsAnalysis $universityCost
     * @return Response
     */
    public function update(UniversityCostsRequest $request, UniversityCostsAnalysis $universityCost)
    {
        $this->authorize("edit-any-UniversityCostsAnalysis");

        $universityCost->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param UniversityCostsAnalysis $universityCost
     * @return Response
     */
    public function destroy(UniversityCostsAnalysis $universityCost)
    {
        $this->authorize("delete-any-UniversityCostsAnalysis");

        $universityCost->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
