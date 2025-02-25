<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Inspector extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

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
        'certificate',
        'terms_accepted',
        'company_id',
        'experience',
        'years_of_experience',
        'bio',
        'data'
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function areas(): BelongsToMany
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

    public function company(): BelongsTo
{
    return $this->belongsTo(Company::class);
}
}
