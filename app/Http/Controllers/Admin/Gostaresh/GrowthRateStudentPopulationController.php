<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\GrowthRateStudentPopulation\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GrowthRateStudentPopulation\GrowthRateStudentPopulationRequest;
use App\Models\Index\GrowthRateStudentPopulation;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 4 Controller
class GrowthRateStudentPopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-GrowthRateStudentPopulation");

        $query = GrowthRateStudentPopulation::whereRequestsQuery();
        $growthRateStudentPopulations = $query->orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.growth-rate-student-population.list.list', compact('growthRateStudentPopulations'));
    }

    // private function getGrowthRateStudentPopulationsQuery()
    // {
    //     $query = GrowthRateStudentPopulation::query();
    //     $query = filterByOwnProvince($query);
    //     return $query;
    // }

    private function getGrowthRateStudentPopulationRecords()
    {
        return GrowthRateStudentPopulation::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $growthRateStudentPopulations = $this->getGrowthRateStudentPopulationRecords();
        return Excel::download(new ListExport($growthRateStudentPopulations), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $growthRateStudentPopulations = $this->getGrowthRateStudentPopulationRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.growth-rate-student-population.list.pdf', compact('growthRateStudentPopulations'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $growthRateStudentPopulations = $this->getGrowthRateStudentPopulationRecords();
        return view('admin.gostaresh.growth-rate-student-population.list.pdf', compact('growthRateStudentPopulations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-GrowthRateStudentPopulation");

        return view('admin.gostaresh.growth-rate-student-population.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GrowthRateStudentPopulationRequest $request
     * @return Response
     */
    public function store(GrowthRateStudentPopulationRequest $request)
    {
        $this->authorize("create-any-GrowthRateStudentPopulation");
        GrowthRateStudentPopulation::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        $this->authorize("edit-any-GrowthRateStudentPopulation");

        return view(
            'admin.gostaresh.growth-rate-student-population.edit.edit', compact('growthRateStudentPopulation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GrowthRateStudentPopulationRequest $request
     * @param int $id
     * @return Response
     */
    public function update(GrowthRateStudentPopulationRequest $request, GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        $this->authorize("edit-any-GrowthRateStudentPopulation");
        $growthRateStudentPopulation->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(GrowthRateStudentPopulation $growthRateStudentPopulation)
    {
        $this->authorize("delete-any-GrowthRateStudentPopulation");
        $growthRateStudentPopulation->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
