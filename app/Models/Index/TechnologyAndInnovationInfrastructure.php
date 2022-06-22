<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Table 39 Model
class TechnologyAndInnovationInfrastructure extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = "gostaresh_technology_and_innovation_infrastructures";
}
