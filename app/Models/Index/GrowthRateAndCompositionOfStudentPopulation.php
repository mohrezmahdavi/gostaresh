<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 4 Model
class GrowthRateAndCompositionOfStudentPopulation extends Model
{
    use HasFactory;
    
    protected $table = 'gostaresh_growth_rate_population';

    protected $guarded = [];
}
