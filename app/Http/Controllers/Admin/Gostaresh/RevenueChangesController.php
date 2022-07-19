<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\RevenueChanges\RevenueChangesRequest;
use App\Models\Index\RevenueChangesTrendsAnalysis;
use Illuminate\Support\Facades\Auth;

// Table 49 Controller
class RevenueChangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = RevenueChangesTrendsAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = RevenueChangesTrendsAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $revenueChanges = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.revenue-changes.list.list', compact('revenueChanges'
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
        return view('admin.gostaresh.revenue-changes.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RevenueChangesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RevenueChangesRequest $request)
    {
         RevenueChangesTrendsAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return void
     */
    public function show(RevenueChangesTrendsAnalysis $revenueChange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return \Illuminate\Http\Response
     */
    public function edit(RevenueChangesTrendsAnalysis $revenueChange)
    {
        return view('admin.gostaresh.revenue-changes.edit.edit', compact('revenueChange'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RevenueChangesRequest $request
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return \Illuminate\Http\Response
     */
    public function update(RevenueChangesRequest $request, RevenueChangesTrendsAnalysis $revenueChange)
    {
        $revenueChange->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RevenueChangesTrendsAnalysis $revenueChange
     * @return \Illuminate\Http\Response
     */
    public function destroy(RevenueChangesTrendsAnalysis $revenueChange)
    {
        $revenueChange->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
