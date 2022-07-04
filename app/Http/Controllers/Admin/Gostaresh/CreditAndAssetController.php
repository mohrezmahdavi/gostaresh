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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditAndAssets =  CreditAndAssetAnalysis::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.credit-and-asset.list.list', compact('creditAndAssets'));
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
        CreditAndAssetAnalysis::create(array_merge(['user_id' => Auth::id()], $request->all()));
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
        $creditAndAsset->update($request->all());
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
