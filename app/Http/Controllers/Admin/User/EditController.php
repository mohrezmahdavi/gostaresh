<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class EditController extends Controller
{
    public function edit(User $user)
    {
        $this->authorize('edit-any-User');

        $user_roles = $user->roles->pluck('id')->toArray();
        $all_roles_in_database = Role::get(['id','name']);
        return view('admin.users.edit', compact('user', 'all_roles_in_database','user_roles'));
    }
}
