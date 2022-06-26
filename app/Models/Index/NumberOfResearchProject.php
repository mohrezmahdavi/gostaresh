<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 7 Model
class NumberOfResearchProject extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_changes_number_of_research';

    protected $guarded = [];
}
