<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Table 11 Model
class UnemploymentRate extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_unemployment_rate_create';
    protected $guarded = [];
}
