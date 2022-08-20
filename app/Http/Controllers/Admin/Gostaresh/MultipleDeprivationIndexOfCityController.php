<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\MultipleDeprivationIndexOfCity\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\MultipleDeprivationIndexOfCity\MultipleDeprivationIndexOfCityRequest;
use App\Models\Index\MultipleDeprivationIndexOfCity;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 13 Controller
class MultipleDeprivationIndexOfCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-MultipleDeprivationIndexOfCity");

        $query = MultipleDeprivationIndexOfCity::whereRequestsQuery();

        $filterColumnsCheckBoxes = MultipleDeprivationIndexOfCity::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $multipleDeprivationIndexOfCities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.multiple-deprivation-index-of-city.list.list', compact('multipleDeprivationIndexOfCities', 'filterColumnsCheckBoxes', 'yearSelectedList'));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    private function getMultipleDeprivationIndexOfCityRecords()
    {
        return MultipleDeprivationIndexOfCity::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $multipleDeprivationIndexOfCities = $this->getMultipleDeprivationIndexOfCityRecords();
        return Excel::download(new ListExport($multipleDeprivationIndexOfCities), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $multipleDeprivationIndexOfCities = $this->getMultipleDeprivationIndexOfCityRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.multiple-deprivation-index-of-city.list.pdf', compact('multipleDeprivationIndexOfCities'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $multipleDeprivationIndexOfCities = $this->getMultipleDeprivationIndexOfCityRecords();
        return view('admin.gostaresh.multiple-deprivation-index-of-city.list.pdf', compact('multipleDeprivationIndexOfCities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-MultipleDeprivationIndexOfCity");

        return view('admin.gostaresh.multiple-deprivation-index-of-city.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MultipleDeprivationIndexOfCityRequest $request
     * @return Response
     */
    public function store(MultipleDeprivationIndexOfCityRequest $request)
    {
        $this->authorize("create-any-MultipleDeprivationIndexOfCity");

        MultipleDeprivationIndexOfCity::create(array_merge(['user_id' => Auth::id()], $request->validated()));

        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        $this->authorize("edit-any-MultipleDeprivationIndexOfCity");

        return view(
            'admin.gostaresh.multiple-deprivation-index-of-city.edit.edit', compact('multipleDeprivationIndexOfCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MultipleDeprivationIndexOfCityRequest $request
     * @param int $id
     * @return Response
     */
    public function update(MultipleDeprivationIndexOfCityRequest $request, MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        $this->authorize("edit-any-MultipleDeprivationIndexOfCity");
        $multipleDeprivationIndexOfCity->update($request->validated());

        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        $this->authorize("delete-any-MultipleDeprivationIndexOfCity");
        $multipleDeprivationIndexOfCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
