<?php

namespace App\Http\Controllers\Api\County;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountyCollection;
use App\Models\County;

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
     * @return CountyCollection
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

        if (request('zone_id')) {
            $query->where('zone', request('zone_id'));
        }

        if (isset(auth()->user()->county_id) and !auth()->user()->hasRole('admin'))
            $query->where('id', auth()->user()->county_id);

        $counties = $query->get();

        return new CountyCollection($counties);
    }
}
