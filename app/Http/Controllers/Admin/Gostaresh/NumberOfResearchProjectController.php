<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\NumberOfResearchProject\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\NumberOfResearchProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\NumberOfResearchProject\NumberOfResearchProjectRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 7 Controller
class NumberOfResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = NumberOfResearchProject::whereRequestsQuery();

        $filterColumnsCheckBoxes = NumberOfResearchProject::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $numberOfResearchProjects = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.number-of-research-project.list.list', compact('numberOfResearchProjects', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getNumberOfResearchProjectRecords()
    {
        return NumberOfResearchProject::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $numberOfResearchProjects = $this->getNumberOfResearchProjectRecords();
        return Excel::download(new ListExport($numberOfResearchProjects), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $numberOfResearchProjects = $this->getNumberOfResearchProjectRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.number-of-research-project.list.pdf', compact('numberOfResearchProjects'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $numberOfResearchProjects = $this->getNumberOfResearchProjectRecords();
        return view('admin.gostaresh.number-of-research-project.list.pdf', compact('numberOfResearchProjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.number-of-research-project.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NumberOfResearchProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NumberOfResearchProjectRequest $request)
    {
        NumberOfResearchProject::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NumberOfResearchProject $numberOfResearchProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberOfResearchProject $numberOfResearchProject)
    {
        return view('admin.gostaresh.number-of-research-project.edit.edit', compact('numberOfResearchProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NumberOfResearchProjectRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NumberOfResearchProjectRequest $request, NumberOfResearchProject $numberOfResearchProject)
    {
        $numberOfResearchProject->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberOfResearchProject $numberOfResearchProject)
    {
        $numberOfResearchProject->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
