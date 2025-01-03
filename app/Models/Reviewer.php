<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Reviewer extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\ReviewerFactory> */
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'username',
        'email',
        'phone',
        'review_fees',
        'city_id',
        'national_id',
        'password',
        'certificate',
        'terms_accepted',
        'company_id'
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
}
