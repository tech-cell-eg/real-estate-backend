<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'phone',
        'city_id',
        'tax_number',
        'password',
        'delegation',
        'terms_accepted',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
}
