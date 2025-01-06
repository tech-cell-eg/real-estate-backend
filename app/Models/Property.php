<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;




    protected $fillable = [
        "client_id",
        "address",
        "city",
        "region",
        "description",
        "area",
        "longitude",
        "latitude",
        "type",
        "status",
    ];

    public function images()
    {
        return $this->hasMany(File::class);
    }

    public function getShortDescription($length)
    {
        return Str::limit($this->description, $length); 
    }
}
