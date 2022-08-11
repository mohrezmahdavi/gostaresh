<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Imports\Users\UsersImport;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create-any-User');
        
        if($request->file('user_file'))
            Excel::import(new UsersImport, $request->file('user_file'));
            
        return redirect()->route('admin.users.list')->with('success','فایل مورد نظر با موفقیت افزوده شد.');
    }
}
