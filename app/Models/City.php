<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'cities';

    public function province()
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }
}
