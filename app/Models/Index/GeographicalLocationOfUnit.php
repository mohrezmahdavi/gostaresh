<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 2 Model
class GeographicalLocationOfUnit extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_geographical_location_of_the_unit';

    protected $guarded = [];
}
