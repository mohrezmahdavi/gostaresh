<?php

namespace App\Models\Index;

use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 1 Model
class DemographicChangesOfCity extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'gostaresh_demographic_changes_of_cities';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    
}
