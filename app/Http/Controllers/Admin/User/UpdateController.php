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
        $user->update([
            'first_name' => $request->first_name ?? null,
            'last_name' => $request->last_name ?? null,
            'phone_number' => $request->phone_number ?? null,
            'status' => $request->status ?? 1,
            // 'role' => $request->role ?? 1,
        ]);
        return back()->with('success','با موفقیت ویرایش شد.');
    }


}
