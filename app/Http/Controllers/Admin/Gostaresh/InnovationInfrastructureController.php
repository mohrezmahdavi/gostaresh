<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\InnovationInfrastructures\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\InnovationInfrastructure\InnovationInfrastructureRequest;
use App\Models\Index\AmountOfFacilitiesForResearchAchievements;
use App\Models\Index\TechnologyAndInnovationInfrastructure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 39 Controller
class InnovationInfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        $query = TechnologyAndInnovationInfrastructure::whereRequestsQuery();

        $filterColumnsCheckBoxes = TechnologyAndInnovationInfrastructure::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $innovationInfrastructures = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.innovation-infrastructures.list.list', compact('innovationInfrastructures'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getTechnologyAndInnovationInfrastructureRecords()
    {
        return TechnologyAndInnovationInfrastructure::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $innovationInfrastructures = $this->getTechnologyAndInnovationInfrastructureRecords();
        return Excel::download(new ListExport($innovationInfrastructures), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $innovationInfrastructures = $this->getTechnologyAndInnovationInfrastructureRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.innovation-infrastructures.list.pdf', compact('innovationInfrastructures'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $innovationInfrastructures = $this->getTechnologyAndInnovationInfrastructureRecords();
        return view('admin.gostaresh.innovation-infrastructures.list.pdf', compact('innovationInfrastructures'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('admin.gostaresh.innovation-infrastructures.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param InnovationInfrastructureRequest $request
     * @return RedirectResponse
     */
    public function store(InnovationInfrastructureRequest $request): RedirectResponse
    {
        TechnologyAndInnovationInfrastructure::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return void
     */
    public function show(TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return Application|Factory|View
     */
    public function edit(TechnologyAndInnovationInfrastructure $innovationInfrastructure): Factory|View|Application
    {
        return view('admin.gostaresh.innovation-infrastructures.edit.edit', compact('innovationInfrastructure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param InnovationInfrastructureRequest $request
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return RedirectResponse
     */
    public function update(InnovationInfrastructureRequest $request, TechnologyAndInnovationInfrastructure $innovationInfrastructure): RedirectResponse
    {
        $innovationInfrastructure->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TechnologyAndInnovationInfrastructure $innovationInfrastructure
     * @return RedirectResponse
     */
    public function destroy(TechnologyAndInnovationInfrastructure $innovationInfrastructure)
    {
        $innovationInfrastructure->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
