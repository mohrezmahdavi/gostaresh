<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function update(UpdateUserRequest $request, User $user)
    {
        if(!auth()->user()->hasPermissionTo('edit-any-user'))
            abort(403);

        $user->update($request->validated());
        return back()->with('success','با موفقیت ویرایش شد.');
    }


}
