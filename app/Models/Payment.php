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
        "client_id",
        "property_id",
        "company_id",
        "paid"
    ];

    function company() {
        return $this->belongsTo(Company::class);
    }

    function property() {
        return $this->belongsTo(Property::class);
    }
}
