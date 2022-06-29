<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 14 Model
class PovertyOfProvincialCity extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_poverty_of_provincial_cities';

    protected $guarded = [];
}
