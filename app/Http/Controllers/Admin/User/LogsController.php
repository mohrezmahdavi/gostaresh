<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class LogsController extends Controller
{

    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function authenticationLogs(User $user)
    {
        $logs = $user->UserLogs()->paginate(15, ["event", "ip_address", "operating_system", "browser", "created_at"]);

        return view("admin.users.security_logs", compact("logs"));
    }

}
