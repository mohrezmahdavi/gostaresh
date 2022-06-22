<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'counties';

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'county_id');
    }

    public function ruralDistricts()
    {
        return $this->hasMany(RuralDistrict::class, 'county_id');
    }
}
