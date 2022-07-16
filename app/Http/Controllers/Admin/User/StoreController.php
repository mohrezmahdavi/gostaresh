<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Arr;

class StoreController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        if(!auth()->user()->hasPermissionTo('create-any-user'))
            abort(403);

        $user = User::create(Arr::except($request->validated(),'roles'));
        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.list')->with('success','کاربر مورد نظر با موفقیت ایجاد شد.');
    }
}
