<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\CreditAndAsset\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\CreditAndAsset\CreditAndAssetRequest;
use App\Models\Index\CreditAndAssetAnalysis;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 56 Controller
class CreditAndAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $this->authorize("view-any-CreditAndAssetAnalysis");

        $query = CreditAndAssetAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = CreditAndAssetAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $creditAndAssets = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.credit-and-asset.list.list', compact('creditAndAssets'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getCreditAndAssetAnalysisRecords()
    {
        return CreditAndAssetAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $creditAndAssets = $this->getCreditAndAssetAnalysisRecords();
        return Excel::download(new ListExport($creditAndAssets), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $creditAndAssets = $this->getCreditAndAssetAnalysisRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.credit-and-asset.list.pdf', compact('creditAndAssets'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $creditAndAssets = $this->getCreditAndAssetAnalysisRecords();
        return view('admin.gostaresh.credit-and-asset.list.pdf', compact('creditAndAssets'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize("create-any-CreditAndAssetAnalysis");

        return view('admin.gostaresh.credit-and-asset.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreditAndAssetRequest $request
     * @return Response
     */
    public function store(CreditAndAssetRequest $request)
    {
        $this->authorize("create-any-CreditAndAssetAnalysis");
        CreditAndAssetAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param CreditAndAssetAnalysis $creditAndAsset
     * @return void
     */
    public function show(CreditAndAssetAnalysis $creditAndAsset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CreditAndAssetAnalysis $creditAndAsset
     * @return Response
     */
    public function edit(CreditAndAssetAnalysis $creditAndAsset)
    {
        $this->authorize("edit-any-CreditAndAssetAnalysis");

        return view(
            'admin.gostaresh.credit-and-asset.edit.edit', compact('creditAndAsset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreditAndAssetRequest $request
     * @param CreditAndAssetAnalysis $creditAndAsset
     * @return Response
     */
    public function update(CreditAndAssetRequest $request, CreditAndAssetAnalysis $creditAndAsset)
    {
        $creditAndAsset->update($request->validated());
        $this->authorize("edit-any-CreditAndAssetAnalysis");
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CreditAndAssetAnalysis $creditAndAsset
     * @return Response
     */
    public function destroy(CreditAndAssetAnalysis $creditAndAsset)
    {
        $creditAndAsset->delete();
        $this->authorize("delete-any-CreditAndAssetAnalysis");
        return back()->with('success', __('titles.success_delete'));
    }
}
