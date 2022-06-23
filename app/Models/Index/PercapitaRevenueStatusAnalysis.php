<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 51 Model
class PercapitaRevenueStatusAnalysis extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_percapita_revenue_status_analyses";
}
