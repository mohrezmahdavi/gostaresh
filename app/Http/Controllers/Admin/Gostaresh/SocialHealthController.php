<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Exports\Gostaresh\SocialHealth\ListExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\SocialHealth\SocialHealthRequest;
use App\Models\Index\SocialHealthStatusAnalysis;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


// Table 43 Controller
class SocialHealthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = SocialHealthStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = SocialHealthStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $socialHealths = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.social-health.list.list', compact('socialHealths'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }
    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }

    // ****************** Export ******************
    private function getSocialHealthRecords()
    {
        return SocialHealthStatusAnalysis::whereRequestsQuery()->orderBy('id', 'desc')->get();
    }

    public function listExcelExport()
    {
        $socialHealths = $this->getSocialHealthRecords();
        return Excel::download(new ListExport($socialHealths), 'invoices.xlsx');
    }

    public function listPDFExport()
    {
        $socialHealths = $this->getSocialHealthRecords();
        $pdfFile = PDF::loadView('admin.gostaresh.social-health.list.pdf', compact('socialHealths'));
        return $pdfFile->download('export-pdf.pdf');
    }

    public function listPrintExport()
    {
        $socialHealths = $this->getSocialHealthRecords();
        return view('admin.gostaresh.social-health.list.pdf', compact('socialHealths'));
    }
    // ****************** End Export ******************

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.social-health.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SocialHealthRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialHealthRequest $request)
    {
         SocialHealthStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return void
     */
    public function show( SocialHealthStatusAnalysis $socialHealth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return \Illuminate\Http\Response
     */
    public function edit( SocialHealthStatusAnalysis $socialHealth)
    {
        return view('admin.gostaresh.social-health.edit.edit', compact('socialHealth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SocialHealthRequest $request
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return \Illuminate\Http\Response
     */
    public function update(SocialHealthRequest $request,  SocialHealthStatusAnalysis $socialHealth)
    {
        $socialHealth->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SocialHealthStatusAnalysis $socialHealth
     * @return \Illuminate\Http\Response
     */
    public function destroy( SocialHealthStatusAnalysis $socialHealth)
    {
        $socialHealth->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
