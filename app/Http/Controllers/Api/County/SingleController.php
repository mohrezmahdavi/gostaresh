<?php

namespace App\Http\Controllers\Api\County;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountyResource;
use App\Models\County;
use Illuminate\Http\Request;

/**
 * @group County Controller
 *
 */
class SingleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @urlParam county integer required The ID of the county
     *
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        return new CountyResource($county);
    }
}
