<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\GDPCity\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\GDPCity\GDPCityRequest;
use App\Models\Index\GDPCity;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 5 Controller
class GDPCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-GDPCity");

        $query = GDPCity::whereRequestsQuery();

        $filterColumnsCheckBoxes = GDPCity::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $gdpCities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.gdp-city.list.list', compact('gdpCities', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // private function getGDPCityQuery()
    // {
    //     $query = GDPCity::query();
    //     $query = filterByOwnProvince($query);
    //     return $query;
    // }

    private function getGDPCityRecords()
    {
        return GDPCity::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $gdpCities = $this->getGDPCityRecords();
        return Excel::download(new ListExport($gdpCities), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $gdpCities = $this->getGDPCityRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.gdp-city.list.pdf', compact('gdpCities'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $gdpCities = $this->getGDPCityRecords();
        return view('admin.gostaresh.gdp-city.list.pdf', compact('gdpCities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-GDPCity");

        return view('admin.gostaresh.gdp-city.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GDPCityRequest $request
     * @return Response
     */
    public function store(GDPCityRequest $request)
    {
        $this->authorize("create-any-GDPCity");
        GDPCity::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(GDPCity $gdpCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(GDPCity $gdpCity)
    {
        $this->authorize("edit-any-GDPCity");

        return view(
            'admin.gostaresh.gdp-city.edit.edit', compact('gdpCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GDPCityRequest $request
     * @param GDPCity $gdpCity
     * @return Response
     */
    public function update(GDPCityRequest $request, GDPCity $gdpCity)
    {
        $this->authorize("edit-any-GDPCity");
        $gdpCity->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(GDPCity $gdpCity)
    {
        $this->authorize("delete-any-GDPCity");
        $gdpCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
