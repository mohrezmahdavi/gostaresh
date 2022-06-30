<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function grade(){
        return $this->belongsTo(Grade::class);
    }
    public function minors(){
        return $this->hasMany(Minor::class);
    }
}
