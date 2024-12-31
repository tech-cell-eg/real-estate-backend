<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        "client_id",
        "name_on_card",
        "card_number",
        "expiration_date",
        "CVC"
    ];
}
