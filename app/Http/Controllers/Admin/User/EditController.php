<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function edit(User $user)
    {
        if(!auth()->user()->hasPermissionTo('edit-any-user'))
            abort(403);

        return view('admin.users.edit', compact('user'));
    }
}
