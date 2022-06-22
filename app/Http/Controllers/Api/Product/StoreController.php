<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product Controller
 *
 * @authenticated
 */
class StoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @bodyParam name string required the name of the product 
     * @bodyParam price float the price of the product
     * @bodyParam qr_code string the qr_code of the product
     * @bodyParam count integer the number of products
     * @urlParam comment integer the id of the comment
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, Comment $comment)
    {
        $product = Product::create([
            'user_id' => auth()->id(),
            'comment_id' => $comment->getKey(),
            'name' => $request->name ?? null,
            'price' => (float)$request->price ?? null,
            'qr_code' => $request->qr_code ?? null,
            'count' => $request->count ?? 1,
        ]);
        return new ProductResource($product);
    }
}
