<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGrade extends Model
{
    use HasFactory;

    protected $guarded= [];


    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function minor(){
        return $this->belongsTo(Minor::class);
    }

}
