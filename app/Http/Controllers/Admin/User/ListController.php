<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
    public function list(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('view-all-users'))
            abort(403);

        $query = User::query();

        if (request('first_name')) {
            $query->where('first_name', 'like', '%' . request('first_name') . '%');
        }

        if (request('last_name')) {
            $query->where('last_name', 'like', '%' . request('last_name') . '%');
        }

        if (request('full_name') != null) {
            $query->where(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%" . request('full_name') . "%");
        }

        if (request('phone_number')) {
            $query->where('phone_number', 'like', '%' . request('phone_number') . '%');
        }

        if (request('status')) {
            $query->where('status', request('status'));
        }

        $users = $query->paginate(15);
        return view('admin.users.list', compact('users'));
    }
}
