<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minor extends Model
{
    use HasFactory;

    protected $guarded= [];

    public function major(){
        return $this->belongsTo(Major::class);
    }
    public function subGrades(){
        return $this->hasMany(SubGrade::class);
    }
}
