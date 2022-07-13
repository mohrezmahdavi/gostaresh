<?php

namespace App\Http\Controllers\Api\RuralDistrict;

use App\Http\Controllers\Controller;
use App\Http\Resources\RuralDistrictCollection;
use App\Models\RuralDistrict;
use Illuminate\Http\Request;

/**
 * @group RuralDistrict Controller
 *
 */
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @queryParam name string The name of the rural districts
     * @queryParam province_id integer The province id of the province
     * @queryParam county_id integer The county id of the county
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = RuralDistrict::query();

        if (request('name')) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }

        if (request('province_id')) {
            $query->where('province_id', request('province_id'));
        }

        if (request('county_id')) {
            $query->where('county_id', request('county_id'));
        }

        if (isset(auth()->user()->rural_district_id) and !auth()->user()->hasRole('admin'))
            $query->where('id', auth()->user()->rural_district_id);

        $ruralDistricts = $query->get();

        return new RuralDistrictCollection($ruralDistricts);
    }
}
