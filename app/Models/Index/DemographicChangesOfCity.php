<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 1 Model
class DemographicChangesOfCity extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'gostaresh_demographic_changes_of_cities';
}
