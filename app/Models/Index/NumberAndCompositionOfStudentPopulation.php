<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 3 Model
class NumberAndCompositionOfStudentPopulation extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_number_and_composition_of_student_population_of_province';

    protected $guarded = [];
}
