<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $fillable = [
        "price",
        "card_id",
        "project_id",
        "from_id",
        "to_id",
        "from_type",
        "to_type",
        "paid"
    ];

    function project() {
        return $this->belongsTo(Project::class);
    }
}
