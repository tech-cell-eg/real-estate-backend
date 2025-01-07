<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'client_id',
        'property_id',
        'company_id',
        'inspector_id',
        'reviewer_id',
        'report_id',
        'client-status',
        'company-status',
        'inspector-status',
        'price',
        'company-rate',
        'inspector-rate',
    ];

    function property()
    {
        return $this->belongsTo(Property::class);
    }

    function company()
    {
        return $this->belongsTo(Company::class);
    }

    function inspector()
    {
        return $this->belongsTo(Inspector::class);
    }

    function notes() {
        return $this->hasMany(ProjectNote::class);
    }

    function report() {
         return $this->belongsTo(Report::class);
    }
}
