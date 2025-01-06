<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        "file_path",
        "price",
        "client_id",
        "company_id",
        "inspector_id",
        "property_id",
        "status"
    ];
}
