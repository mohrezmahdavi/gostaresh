<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


// Table 5 Model
class GDPCity extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_gdp_cities';

    protected $guarded = [];
}
