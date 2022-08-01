<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CreateController extends Controller
{
    public function create()
    {
        $this->authorize("create-any-User", "User");

        $all_roles_in_database = Role::get(['id','name']);

        return view('admin.users.create', compact('all_roles_in_database'));
    }
}
