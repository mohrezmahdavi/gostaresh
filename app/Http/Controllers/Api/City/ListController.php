<?php

namespace App\Http\Controllers\Api\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityCollection;
use App\Models\City;
use Illuminate\Http\Request;

/**
 * @group City Controller
 *
 */
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @queryParam name string The name of the cities
     * @queryParam province_id integer The province id of the province
     * @queryParam county_id integer The county id of the county
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = City::query();

        if (request('name')) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }

        if (request('province_id')) {
            $query->where('province_id', request('province_id'));
        }

        if (request('county_id')) {
            $query->where('county_id', request('county_id'));
        }

        if (isset(auth()->user()->city_id) and !auth()->user()->hasRole('admin'))
            $query->where('id', auth()->user()->city_id);

        $cities = $query->get();

        return new CityCollection($cities);
    }
}

