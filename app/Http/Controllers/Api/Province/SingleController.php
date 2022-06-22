<?php

namespace App\Http\Controllers\Api\Province;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

/**
 * @group Province Controller
 *
 */
class SingleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @urlParam province integer required The ID of the province
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        return new ProvinceResource($province);
    }
}
