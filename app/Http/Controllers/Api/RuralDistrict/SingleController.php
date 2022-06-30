<?php

namespace App\Http\Controllers\Api\RuralDistrict;

use App\Http\Controllers\Controller;
use App\Http\Resources\RuralDistrictResource;
use App\Models\RuralDistrict;
use Illuminate\Http\Request;

/**
 * @group RuralDistrict Controller
 *
 */
class SingleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @urlParam rural district integer required The ID of the rural district
     *
     * @return \Illuminate\Http\Response
     */
    public function show(RuralDistrict $ruralDistrict)
    {
        return new RuralDistrictResource($ruralDistrict);
    }
}
