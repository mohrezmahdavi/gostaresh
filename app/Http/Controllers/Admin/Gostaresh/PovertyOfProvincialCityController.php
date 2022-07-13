<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\PovertyOfProvincialCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Table 14 Controller
class PovertyOfProvincialCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = PovertyOfProvincialCity::query();

        $query = filterByOwnProvince($query);

        $povertyOfProvincialCities = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.poverty-of-provincial-citiy.list.list', compact('povertyOfProvincialCities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.poverty-of-provincial-citiy.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PovertyOfProvincialCity::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        return view('admin.gostaresh.poverty-of-provincial-citiy.edit.edit', compact('povertyOfProvincialCity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        $povertyOfProvincialCity->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PovertyOfProvincialCity $povertyOfProvincialCity)
    {
        $povertyOfProvincialCity->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
