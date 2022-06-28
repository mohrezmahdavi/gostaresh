<?php

namespace App\Http\Controllers\Admin\Gostaresh;

use App\Http\Controllers\Controller;
use App\Models\Index\TechnologicalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Table 40 Controller
class TechnologicalProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologicalProduct =  TechnologicalProduct::orderBy('id', 'desc')->paginate(20);
        return view('admin.gostaresh.technological-product.list.list', compact('technologicalProduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gostaresh.technological-product.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         TechnologicalProduct::create(array_merge(['user_id' => Auth::id()], $request->all()));
        return redirect()->back()->with('success', __('titles.success_store'));
    }

    /**
     * Display the specified resource.
     *
     * @param  TechnologicalProduct $technologicalProduct
     * @return void
     */
    public function show( TechnologicalProduct $technologicalProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TechnologicalProduct $technologicalProduct
     * @return \Illuminate\Http\Response
     */
    public function edit( TechnologicalProduct $technologicalProduct)
    {
        return view('admin.gostaresh.technological-product.edit.edit', compact('technologicalProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TechnologicalProduct $technologicalProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  TechnologicalProduct $technologicalProduct)
    {
        $technologicalProduct->update($request->all());
        return back()->with('success', __('titles.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TechnologicalProduct $technologicalProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy( TechnologicalProduct $technologicalProduct)
    {
        $technologicalProduct->delete();
        return back()->with('success', __('titles.success_delete'));
    }
}
