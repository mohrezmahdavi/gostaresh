<?php

namespace App\Models\Index;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Table 8 Model
class PaymentRAndDDepartment extends Model
{
    use HasFactory;

    protected $table = 'gostaresh_amount_rd_department';

    protected $guarded = [];
}
