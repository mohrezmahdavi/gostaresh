<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 9 Model
class PercentageIndustrialSectorExpenditureResearchAndDevelopment extends Model
{
    use HasFactory;
    
    protected $table = 'gostaresh_industrial_expenditure_research';

    protected $guarded = [];
}
