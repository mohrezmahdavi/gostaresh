<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gostaresh\OrganizationalCulture\OrganizationalCultureRequest;
use App\Models\Index\OrganizationalCultureStatusAnalysis;
use Illuminate\Support\Facades\Auth;

// Table 44 Controller
class OrganizationalCultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = OrganizationalCultureStatusAnalysis::whereRequestsQuery();

        $filterColumnsCheckBoxes = OrganizationalCultureStatusAnalysis::$filterColumnsCheckBoxes;

        $yearSelectedList = $this->yearSelectedList(clone $query);

        $query = filterByOwnProvince($query);

        $organizationalCultures = $query->orderBy('id', 'desc')->paginate(20);

        return view('admin.gostaresh.organizational-culture.list.list', compact('organizationalCultures'
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
        return view('admin.gostaresh.organizational-culture.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrganizationalCultureRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganizationalCultureRequest $request)
    {
        OrganizationalCultureStatusAnalysis::create(array_merge(['user_id' => Auth::id()], $request->validated()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return void
     */
    public function show(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        return view('admin.gostaresh.organizational-culture.edit.edit', compact('organizationalCulture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param OrganizationalCultureRequest $request
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationalCultureRequest $request, OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $organizationalCulture->update($request->validated());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param OrganizationalCultureStatusAnalysis $organizationalCulture
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationalCultureStatusAnalysis $organizationalCulture)
    {
        $organizationalCulture->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
