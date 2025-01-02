<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

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

    public function city(): BelongsTo
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


    public function wallet()
{
    return $this->hasOne(CompanyWallet::class);
}

public function inspectors()
{
    return $this->hasMany(Inspector::class);
}
}
