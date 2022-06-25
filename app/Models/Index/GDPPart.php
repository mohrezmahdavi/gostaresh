<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 6 Model
class GDPPart extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_gdp_parts';

    protected $guarded = [];
}
