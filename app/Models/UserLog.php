<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;

    protected $table = "users_logs";

    protected $fillable = ["user_id", "event", "ip_address", "operating_system", "browser", "user_agent"];

    public function User()
    {
        return $this->belongsTo(User::class, "user_id")->select(["fist_name", "last_name"]);
    }
}
