<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function create()
    {
        if(!auth()->user()->hasPermissionTo('create-any-user'))
            abort(403);

        return view('admin.users.create');
    }
}
