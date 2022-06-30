<?php

namespace App\Http\Controllers\Api\Province;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceCollection;
use App\Models\Province;
use Illuminate\Http\Request;

/**
 * @group Province Controller
 *
 */
class ListController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @queryParam name string The name of the provinces
     * @queryParam country_id integer The country id of the Country
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Province::query();

        if (request('name')) {
            $query->where('name', 'like', '%' . request('name') . '%');
        }

        if (request('country_id')) {
            $query->where('country_id', request('country_id'));
        }

        $provinces = $query->get();

        return new ProvinceCollection($provinces);
    }
}
