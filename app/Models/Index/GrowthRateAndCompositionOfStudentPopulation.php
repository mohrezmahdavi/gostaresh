<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 4 Model
class GrowthRateAndCompositionOfStudentPopulation extends Model
{
    use HasFactory;
    
    protected $table = 'gostaresh_growth_rate_and_composition_of_province_student_population';

    protected $guarded = [];
}
