<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product Controller
 *
 * @authenticated
 */
class UpdateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam name string required the name of the product 
     * @bodyParam price float the price of the product
     * @bodyParam qr_code string the qr_code of the product
     * @bodyParam count ineger the count of the product
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name ?? null,
            'price' => (float)$request->price ?? null,
            'qr_code' => $request->qr_code ?? null,
            'count' => (int)$request->count ?? 1,
        ]);
        return new ProductResource($product);
    }
}
