<?php

namespace App\Http\Controllers\Api\City;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

/**
 * @group City Controller
 *
 */
class SingleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @urlParam city integer required The ID of the city
     *
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }
}