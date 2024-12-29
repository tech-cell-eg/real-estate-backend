<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function clients(): HasMany
    {
        return $this->hasMany(Area::class);
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
