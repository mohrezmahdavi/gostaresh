<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\InternationalTechnology;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 41 Controller
class InternationalTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $internationalTechnologies =  InternationalTechnology::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.international-technology.list.list', compact('internationalTechnologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.gostaresh.international-technology.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
         InternationalTechnology::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  InternationalTechnology $internationalTechnology
     * @return void
     */
    public function show( InternationalTechnology $internationalTechnology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  InternationalTechnology $internationalTechnology
     * @return Application|Factory|View
     */
    public function edit( InternationalTechnology $internationalTechnology)
    {
        return view('admin.gostaresh.international-technology.edit.edit', compact('internationalTechnology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  InternationalTechnology $internationalTechnology
     * @return RedirectResponse
     */
    public function update(Request $request,  InternationalTechnology $internationalTechnology)
    {
        $internationalTechnology->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  InternationalTechnology $internationalTechnology
     * @return RedirectResponse
     */
    public function destroy( InternationalTechnology $internationalTechnology)
    {
        $internationalTechnology->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
