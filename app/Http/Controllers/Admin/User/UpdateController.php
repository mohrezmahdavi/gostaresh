<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Arr;

class UpdateController extends Controller
{
    public function update(UpdateUserRequest $request, User $user)
    {
        if(!auth()->user()->hasPermissionTo('edit-any-user'))
            abort(403);

        $user->update(Arr::except($request->validated(),'roles'));
        $user->syncRoles($request->roles);

        return back()->with('success','با موفقیت ویرایش شد.');
    }


}
