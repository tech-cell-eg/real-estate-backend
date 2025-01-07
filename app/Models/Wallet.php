<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'owner_id',
        'owner_type',
        'current_balance',
        'outstanding_balance'
    ];
}
