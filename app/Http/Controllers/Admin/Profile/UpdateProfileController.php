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

        $user->update($request->validated());
        return back()->with('success','با موفقیت ویرایش شد.');
    }

}
