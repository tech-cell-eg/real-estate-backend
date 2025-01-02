<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = [
        "client_id",
        "property_id",
        "company_id",
        "inspector_id",
        "status",
        "companyRate",
        "inspectorsRate"
    ];

    function property() {
        return $this->belongsTo(Property::class);
    }

    function company() {
        return $this->belongsTo(Company::class);
    }

    function inspector() {
        return $this->belongsTo(Inspector::class);
    }


    public function notes()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function comments()
    {
        return $this->hasMany(ProjectComment::class);
    }

    public function scopeFilters(Builder $builder,$filters){

        $builder->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('status', $status);
        });
    }

}
