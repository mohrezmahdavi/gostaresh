<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 22 Model
class AverageTestScoreOfTheFirstThirtyPercentOfAdmitted extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_test_score_of_the_first_thirty_percent_of_admitted";
}
