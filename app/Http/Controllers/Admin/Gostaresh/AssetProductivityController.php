<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\AssetProductivity\AssetProductivityRequest;
use App\Models\Index\IndexOfAssetProductivity;
use Illuminate\Support\Facades\Auth;

// Table 47 Controller
class AssetProductivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = IndexOfAssetProductivity::whereRequestQuery();

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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.asset-productivity.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssetProductivityRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetProductivityRequest $request)
    {
         IndexOfAssetProductivity::create(array_merge(['user_id' => Auth::id()], $request->all()));
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
     * @return \Illuminate\Http\Response
     */
    public function edit(IndexOfAssetProductivity $assetProductivity)
    {
        return view('admin.gostaresh.asset-productivity.edit.edit', compact('assetProductivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssetProductivityRequest $request
     * @param IndexOfAssetProductivity $assetProductivity
     * @return \Illuminate\Http\Response
     */
    public function update(AssetProductivityRequest $request, IndexOfAssetProductivity $assetProductivity)
    {
        $assetProductivity->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param IndexOfAssetProductivity $assetProductivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndexOfAssetProductivity $assetProductivity)
    {
        $assetProductivity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
