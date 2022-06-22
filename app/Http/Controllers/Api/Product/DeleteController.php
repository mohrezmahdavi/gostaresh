<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product Controller
 *
 * @authenticated
 */
class DeleteController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @urlParam product integer required The ID of the product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json();
    }
}
