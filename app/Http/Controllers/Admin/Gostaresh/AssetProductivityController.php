<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\AssetProductivity\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AssetProductivity\AssetProductivityRequest;
use App\Models\Index\IndexOfAssetProductivity;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 47 Controller
class AssetProductivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize("view-any-IndexOfAssetProductivity");

        $query = IndexOfAssetProductivity::whereRequestsQuery();

        $filterColumnsCheckBoxes = IndexOfAssetProductivity::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $assetProductivity = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.asset-productivity.list.list', compact('assetProductivity'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getAssetProductivityRecords()
    {
        return IndexOfAssetProductivity::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $assetProductivity = $this->getAssetProductivityRecords();
        return Excel::download(new ListExport($assetProductivity), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $assetProductivity = $this->getAssetProductivityRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.asset-productivity.list.pdf', compact('assetProductivity'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $assetProductivity = $this->getAssetProductivityRecords();
        return view('admin.gostaresh.asset-productivity.list.pdf', compact('assetProductivity'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-IndexOfAssetProductivity");

        return view('admin.gostaresh.asset-productivity.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssetProductivityRequest $request
     * @return Response
     */
    public function store(AssetProductivityRequest $request)
    {
        $this->authorize("create-any-IndexOfAssetProductivity");
        IndexOfAssetProductivity::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param IndexOfAssetProductivity $assetProductivity
     * @return void
     */
    public function show(IndexOfAssetProductivity $assetProductivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param IndexOfAssetProductivity $assetProductivity
     * @return Response
     */
    public function edit(IndexOfAssetProductivity $assetProductivity)
    {
        $this->authorize("edit-any-IndexOfAssetProductivity");

        return view('admin.gostaresh.asset-productivity.edit.edit', compact('assetProductivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssetProductivityRequest $request
     * @param IndexOfAssetProductivity $assetProductivity
     * @return Response
     * @throws AuthorizationException
     */
    public function update(AssetProductivityRequest $request, IndexOfAssetProductivity $assetProductivity)
    {
        $this->authorize("edit-any-IndexOfAssetProductivity");
        $assetProductivity->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param IndexOfAssetProductivity $assetProductivity
     * @return Response
     */
    public function destroy(IndexOfAssetProductivity $assetProductivity)
    {
        $this->authorize("delete-any-IndexOfAssetProductivity");
        $assetProductivity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
