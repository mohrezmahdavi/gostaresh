<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function delete(User $user)
    {
        if(!auth()->user()->hasPermissionTo('delete-any-user'))
            abort(403);

        $user->delete();
        return back()->with('success','کاربر مورد نظر با موفقیت حذف شد.');
    }
}
