<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\DemographicChangesOfCity\ListExport;
use App\Exports\Gostaresh\DemographicChangesOfCity\PDFExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\DemographicChangesOfCity\DemographicChangesOfCityRequest;
use App\Models\Index\DemographicChangesOfCity;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 1 Controller
class DemographicChangesOfCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $this->authorize("view-any-DemographicChangesOfCity");

        $query = DemographicChangesOfCity::whereRequestsQuery();
        $yearSelectedList = $this->yearSelectedList(clone $query);
        $demographicChangesOfCities = $query->orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.demographic-changes-of-city.list.list', compact('demographicChangesOfCities', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    public function getDemographicChangesOfCityRecords()
    {
        return DemographicChangesOfCity::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }


    public function listExcelExport()
    {
        $demographicChangesOfCities = $this->getDemographicChangesOfCityRecords();
        return Excel::download(new ListExport($demographicChangesOfCities), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $demographicChangesOfCities = $this->getDemographicChangesOfCityRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.demographic-changes-of-city.list.pdf', compact('demographicChangesOfCities'));
        return $pdfFile->download('users-list.pdf');
    }

    public function listPrintExport()
    {
        $demographicChangesOfCities = $this->getDemographicChangesOfCityRecords();
        return view('admin.gostaresh.demographic-changes-of-city.list.pdf', compact('demographicChangesOfCities'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-DemographicChangesOfCity");

        return view('admin.gostaresh.demographic-changes-of-city.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DemographicChangesOfCityRequest $request
     * @return Response
     */
    public function store(DemographicChangesOfCityRequest $request)
    {
        $this->authorize("create-any-DemographicChangesOfCity");

        DemographicChangesOfCity::create([
            'user_id'           => Auth::user()?->id,
            'country_id'        => $request->country_id ?? 1,
            'province_id'       => $request->province_id ?? null,
            'county_id'         => $request->county_id ?? null,
            'city_id'           => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'population'        => $request->population ?? 0,
            'immigration_rates' => $request->immigration_rates ?? 0,
            'growth_rate'       => $request->growth_rate ?? 0,
            'year'              => $request->year ?? null,
            'month'             => $request->month ?? null,
        ]);
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(DemographicChangesOfCity $demographicChangesOfCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param DemographicChangesOfCity $demographicChangesOfCity
     * @return Response
     */
    public function edit(DemographicChangesOfCity $demographicChangesOfCity)
    {
        $this->authorize("edit-any-DemographicChangesOfCity");

        return view('admin.gostaresh.demographic-changes-of-city.edit.edit', compact('demographicChangesOfCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DemographicChangesOfCityRequest $request
     * @param int $id
     * @return Response
     */
    public function update(DemographicChangesOfCityRequest $request, DemographicChangesOfCity $demographicChangesOfCity)
    {
        $this->authorize("edit-any-DemographicChangesOfCity");

        $demographicChangesOfCity->update([
            'country_id'        => $request->country_id ?? 1,
            'province_id'       => $request->province_id ?? null,
            'county_id'         => $request->county_id ?? null,
            'city_id'           => $request->city_id ?? null,
            'rural_district_id' => $request->rural_district_id ?? null,
            'population'        => $request->population ?? 0,
            'immigration_rates' => $request->immigration_rates ?? 0,
            'growth_rate'       => $request->growth_rate ?? 0,
            'year'              => $request->year ?? null,
            'month'             => $request->month ?? null,
        ]);

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DemographicChangesOfCity $demographicChangesOfCity
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(DemographicChangesOfCity $demographicChangesOfCity)
    {
        $this->authorize("delete-any-DemographicChangesOfCity");

        $demographicChangesOfCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
