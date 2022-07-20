<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\TechnologicalProduct\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\TechnologicalProduct\TechnologicalProductRequest;
use App\Models\Index\TechnologicalProduct;
use App\Models\Index\TechnologyAndInnovationInfrastructure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Table 40 Controller
class TechnologicalProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $query = TechnologicalProduct::whereRequestsQuery();

        $filterColumnsCheckBoxes = TechnologicalProduct::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $technologicalProducts = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.technological-product.list.list', compact('technologicalProducts'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getTechnologicalProductRecords()
    {
        return TechnologicalProduct::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $technologicalProducts = $this->getTechnologicalProductRecords();
        return Excel::download(new ListExport($technologicalProducts), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $technologicalProducts = $this->getTechnologicalProductRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.technological-product.list.pdf', compact('technologicalProducts'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $technologicalProducts = $this->getTechnologicalProductRecords();
        return view('admin.gostaresh.technological-product.list.pdf', compact('technologicalProducts'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gostaresh.technological-product.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TechnologicalProductRequest $request
     * @return RedirectResponse
     */
    public function store(TechnologicalProductRequest $request)
    {
        TechnologicalProduct::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param TechnologicalProduct $technologicalProduct
     * @return void
     */
    public function show(TechnologicalProduct $technologicalProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TechnologicalProduct $technologicalProduct
     * @return Application|Factory|View
     */
    public function edit(TechnologicalProduct $technologicalProduct)
    {
        return view('admin.gostaresh.technological-product.edit.edit', compact('technologicalProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TechnologicalProductRequest $request
     * @param TechnologicalProduct $technologicalProduct
     * @return RedirectResponse
     */
    public function update(TechnologicalProductRequest $request, TechnologicalProduct $technologicalProduct)
    {
        $technologicalProduct->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param TechnologicalProduct $technologicalProduct
     * @return RedirectResponse
     */
    public function destroy(TechnologicalProduct $technologicalProduct)
    {
        $technologicalProduct->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
