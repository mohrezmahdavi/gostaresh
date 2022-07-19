<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\PercapitaRevenue\PercapitaRevenueRequest;
use App\Models\Index\AverageTuitionIncome;
use App\Models\Index\PercapitaRevenueStatusAnalysis;
use Illuminate\Support\Facades\Auth;

// Table 51 Controller
class PercapitaRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = PercapitaRevenueStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = PercapitaRevenueStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $percapitaRevenue = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.percapita-revenue.list.list', compact('percapitaRevenue'
            , 'yearSelectedList', 'filterColumnsCheckBoxes'
        ));
    }

    private function yearSelectedList($query)
    {
        return $query->select('year')->distinct()->pluck('year');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.percapita-revenue.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PercapitaRevenueRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PercapitaRevenueRequest $request)
    {
         PercapitaRevenueStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return void
     */
    public function show(PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return \Illuminate\Http\Response
     */
    public function edit(PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        return view('admin.gostaresh.percapita-revenue.edit.edit', compact('percapitaRevenue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PercapitaRevenueRequest $request
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return \Illuminate\Http\Response
     */
    public function update(PercapitaRevenueRequest $request, PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        $percapitaRevenue->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PercapitaRevenueStatusAnalysis $percapitaRevenue
     * @return \Illuminate\Http\Response
     */
    public function destroy(PercapitaRevenueStatusAnalysis $percapitaRevenue)
    {
        $percapitaRevenue->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
