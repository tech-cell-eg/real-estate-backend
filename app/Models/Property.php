<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;




    protected $fillable = [
        "address",
        "city",
        "region",
        "description",
        "area",
        "longitude",
        "latitude",
        "type",
        "price",
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }   

    public function getShortDescription($length)
    {
        return Str::limit($this->description, $length); 
    }
}
