<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product Controller
 *
 * @authenticated
 */
class SingleController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @urlParam product integer required The ID of the product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }
}
