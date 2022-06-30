<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function majors(){
        return $this->hasMany(Major::class);
    }
    public function subGrades(){
        return $this->hasMany(SubGrade::class);
    }

}
