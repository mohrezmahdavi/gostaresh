<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\MultipleDeprivationIndexOfCity\ListExport;
use App\Http\Controllers\Controller;
use App\Models\Index\MultipleDeprivationIndexOfCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\MultipleDeprivationIndexOfCity\MultipleDeprivationIndexOfCityRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 13 Controller
class MultipleDeprivationIndexOfCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = MultipleDeprivationIndexOfCity::query();

        $query = filterByOwnProvince($query);

        $multipleDeprivationIndexOfCities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.multiple-deprivation-index-of-city.list.list', compact('multipleDeprivationIndexOfCities'));
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.multiple-deprivation-index-of-city.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MultipleDeprivationIndexOfCityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultipleDeprivationIndexOfCityRequest $request)
    {
        MultipleDeprivationIndexOfCity::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        return view('admin.gostaresh.multiple-deprivation-index-of-city.edit.edit', compact('multipleDeprivationIndexOfCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MultipleDeprivationIndexOfCityRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MultipleDeprivationIndexOfCityRequest $request, MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        $multipleDeprivationIndexOfCity->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MultipleDeprivationIndexOfCity $multipleDeprivationIndexOfCity)
    {
        $multipleDeprivationIndexOfCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
