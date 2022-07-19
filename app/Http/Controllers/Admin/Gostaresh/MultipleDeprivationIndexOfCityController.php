<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\MultipleDeprivationIndexOfCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Gostaresh\MultipleDeprivationIndexOfCity\MultipleDeprivationIndexOfCityRequest;
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
        $query = MultipleDeprivationIndexOfCity::whereRequestsQuery();

        $filterColumnsCheckBoxes = MultipleDeprivationIndexOfCity::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $multipleDeprivationIndexOfCities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.multiple-deprivation-index-of-city.list.list', compact('multipleDeprivationIndexOfCities', 'filterColumnsCheckBoxes', 'yearSelectedList'));
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
