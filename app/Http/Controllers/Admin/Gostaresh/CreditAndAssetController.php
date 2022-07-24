<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\CreditAndAsset\CreditAndAssetRequest;
use App\Models\Index\CreditAndAssetAnalysis;
use Illuminate\Support\Facades\Auth;

// Table 56 Controller
class CreditAndAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.credit-and-asset.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreditAndAssetRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditAndAssetRequest $request)
    {
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
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditAndAssetAnalysis $creditAndAsset)
    {
        return view('admin.gostaresh.credit-and-asset.edit.edit', compact('creditAndAsset'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreditAndAssetRequest $request
     * @param CreditAndAssetAnalysis $creditAndAsset
     * @return \Illuminate\Http\Response
     */
    public function update(CreditAndAssetRequest $request, CreditAndAssetAnalysis $creditAndAsset)
    {
        $creditAndAsset->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CreditAndAssetAnalysis $creditAndAsset
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditAndAssetAnalysis $creditAndAsset)
    {
        $creditAndAsset->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
