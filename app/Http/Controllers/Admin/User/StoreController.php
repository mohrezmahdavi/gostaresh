<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name ?? null,
            'last_name' => $request->last_name ?? null,
            'phone_number' => $request->phone_number ?? null,
            'status' => $request->status ?? 1,
            // 'role' => $request->role ?? 1,
        ]);
        return redirect()->route('admin.users.list')->with('success','کاربر مورد نظر با موفقیت ایجاد شد.');
    }

}
