<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 12 Model
class EmploymentOfProvincialCity extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_employment_of_provincial';

    protected $guarded = [''];
}
