<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 15 Model
class AcademicMajorEducational extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_academic_major_educational';
    protected $guarded = [];
}
