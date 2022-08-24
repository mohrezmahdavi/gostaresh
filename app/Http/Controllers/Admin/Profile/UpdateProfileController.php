<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfileController extends Controller
{
    public function update(UpdateUserProfileRequest $request)
    {
        $user = Auth::user();

        $user->update([
            'first_name' => (string) $request->first_name,
            'last_name' => (string) $request->last_name,
            'status' => (int) $request->status,
            'phone_number' => (string) $request->phone_number,
            'province_id' =>  ($request->province_id != null) ? (int)$request->province_id : null,
            'county_id' => ($request->county_id != null) ? (int)$request->county_id : null,
            'city_id' => ($request->city_id != null) ? (int)$request->city_id : null,
            'rural_district_id' => ($request->rural_district_id != null) ? (int)$request->rural_district_id : null,
            'username' => ($request->username != null) ? $request->username : null,
        ]);
        if ($request->password) {
            $user->password = Hash::make((string)$request->password);
            $user->save();
        }
        return back()->with('success','با موفقیت ویرایش شد.');
    }

}
