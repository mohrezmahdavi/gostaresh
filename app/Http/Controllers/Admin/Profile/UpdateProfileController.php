<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    public function update(UpdateUserProfileRequest $request)
    {
        $user = Auth::user();
        
        $user->update([
            'first_name' => $request->first_name ?? null,
            'last_name' => $request->last_name ?? null,
            'phone_number' => $request->phone_number ?? null,
            'status' => $request->status ?? null,
        ]);
        return back()->with('success','با موفقیت ویرایش شد.');
    }

}
