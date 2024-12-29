<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Inspector extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'phone',
        'inspection_fees',
        'city_id',
        'national_id',
        'area_id_1',
        'area_id_2',
        'area_id_3',
        'password',
        'delegation',
        'terms_accepted',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
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
