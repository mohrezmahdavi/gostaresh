<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 12 Model
class EmploymentOfProvincial extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_employment_of_provincial';

    protected $guarded = [''];
}
