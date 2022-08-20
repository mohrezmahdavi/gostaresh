<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\PovertyOfProvincialCity\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\PovertyOfProvincialCity\PovertyOfProvincialCityRequest;
use App\Models\Index\PovertyOfProvincialCity;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

//Table 14 Controller
class PovertyOfProvincialCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-PovertyOfProvincialCity");

        $query = PovertyOfProvincialCity::whereRequestsQuery();

        $filterColumnsCheckBoxes = PovertyOfProvincialCity::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $povertyOfProvincialCities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.poverty-of-provincial-citiy.list.list', compact('povertyOfProvincialCities', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getPovertyOfProvincialCityRecords()
    {
        return PovertyOfProvincialCity::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $povertyOfProvincialCities = $this->getPovertyOfProvincialCityRecords();
        return Excel::download(new ListExport($povertyOfProvincialCities), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $povertyOfProvincialCities = $this->getPovertyOfProvincialCityRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.poverty-of-provincial-citiy.list.pdf', compact('povertyOfProvincialCities'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $povertyOfProvincialCities = $this->getPovertyOfProvincialCityRecords();
        return view('admin.gostaresh.poverty-of-provincial-citiy.list.pdf', compact('povertyOfProvincialCities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-PovertyOfProvincialCity");

        return view('admin.gostaresh.poverty-of-provincial-citiy.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PovertyOfProvincialCityRequest $request
     * @return Response
     */
    public function store(PovertyOfProvincialCityRequest $request)
    {
        $this->authorize("create-any-PovertyOfProvincialCity");

        PovertyOfProvincialCity::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        $this->authorize("edit-any-PovertyOfProvincialCity");

        return view(
            'admin.gostaresh.poverty-of-provincial-citiy.edit.edit', compact('povertyOfProvincialCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PovertyOfProvincialCityRequest $request
     * @param int $id
     * @return Response
     */
    public function update(PovertyOfProvincialCityRequest $request, PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        $this->authorize("edit-any-PovertyOfProvincialCity");
        $povertyOfProvincialCity->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        $this->authorize("delete-any-PovertyOfProvincialCity");
        $povertyOfProvincialCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
