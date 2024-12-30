<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    // protected $guarded=[];


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        "address",
        "city",
        "region",
        "images",
        "description",
        "area",
        "longitude",
        "latitude",
        "type"
    ];
}
