<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * @group Product Controller
 *
 * @authenticated
 */
class ListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @queryParam limit integer The Limit of the products
     * @queryParam page integer The Page of the products
     * @queryParam name text The name of the products
     * @queryParam qr_code text The QR Code of the products
     * @queryParam user_id integer The User ID of the products
     * @queryParam comment_id integer The Comment ID of the products
     * @queryParam count integer The count of the products
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Product::query();
        $limit = request('limit', 10);
        $page = request('page', 1);

        if (request('name')) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }

        if (request('qr_code')) {
            $query->where('qr_code', request('qr_code'));
        }

        if (request('user_id')) {
            $query->where('user_id', request('user_id'));
        }

        if (request('comment_id')) {
            $query->where('comment_id', request('comment_id'));
        }

        if (request('count')) {
            $query->where('count', request('count'));
        }

        $cloneQuery = clone $query;

        $products = $query->take($limit)->skip(($page - 1) * $limit)->get();

        return new ProductCollection($products, $limit, $page, $cloneQuery);
    }
}
