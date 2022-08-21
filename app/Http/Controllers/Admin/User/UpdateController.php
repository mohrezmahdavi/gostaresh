<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function update(UpdateUserRequest $request, User $user)
    {
     $this->authorize("edit-any-User");

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
        
        $user->syncRoles($request->roles);

        return back()->with('success','با موفقیت ویرایش شد.');
    }


}
