<?php

namespace App\Http\Controllers\Api\County;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountyCollection;
use App\Models\County;
use Illuminate\Http\Request;

/**
 * @group County Controller
 *
 */
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @queryParam name string The name of the counties
     * @queryParam province_id integer The province id of the province
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = County::query();

        if (request('name')) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }

        if (request('province_id')) {
            $query->where('province_id', request('province_id'));
        }

        $counties = $query->get();

        return new CountyCollection($counties);
    }
}
