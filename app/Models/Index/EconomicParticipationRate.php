<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 10 Model
class EconomicParticipationRate extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_economic_participation_rate';

    protected $guarded = [];
}
