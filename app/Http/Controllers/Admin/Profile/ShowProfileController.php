<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.profile', compact('user'));
    }
}
