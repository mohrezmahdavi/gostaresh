<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\InternationalTechnology\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InternationalTechnology\InternationalTechnologyRequest;
use App\Models\Index\InternationalTechnology;
use App\Models\Index\TechnologicalProduct;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 41 Controller
class InternationalTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $query = InternationalTechnology::whereRequestsQuery();

        $filterColumnsCheckBoxes = InternationalTechnology::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $internationalTechnologies = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.international-technology.list.list', compact('internationalTechnologies'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getInternationalTechnologyRecords()
    {
        return InternationalTechnology::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $internationalTechnologies = $this->getInternationalTechnologyRecords();
        return Excel::download(new ListExport($internationalTechnologies), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $internationalTechnologies = $this->getInternationalTechnologyRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.international-technology.list.pdf', compact('internationalTechnologies'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $internationalTechnologies = $this->getInternationalTechnologyRecords();
        return view('admin.gostaresh.international-technology.list.pdf', compact('internationalTechnologies'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gostaresh.international-technology.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InternationalTechnologyRequest $request
     * @return RedirectResponse
     */
    public function store(InternationalTechnologyRequest $request)
    {
         InternationalTechnology::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  InternationalTechnology $internationalTechnology
     * @return void
     */
    public function show( InternationalTechnology $internationalTechnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  InternationalTechnology $internationalTechnology
     * @return Application|Factory|View
     */
    public function edit( InternationalTechnology $internationalTechnology)
    {
        return view('admin.gostaresh.international-technology.edit.edit', compact('internationalTechnology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InternationalTechnologyRequest $request
     * @param InternationalTechnology $internationalTechnology
     * @return RedirectResponse
     */
    public function update(InternationalTechnologyRequest $request,  InternationalTechnology $internationalTechnology)
    {
        $internationalTechnology->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  InternationalTechnology $internationalTechnology
     * @return RedirectResponse
     */
    public function destroy( InternationalTechnology $internationalTechnology)
    {
        $internationalTechnology->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
