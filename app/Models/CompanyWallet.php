<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class CompanyWallet extends Model
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'company_id',
        'current_balance',
        'outstanding_balance'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
