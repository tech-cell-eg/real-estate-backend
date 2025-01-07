<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    /** @use HasFactory<\Database\Factories\ReportFactory> */
    use HasFactory;

        protected $fillable = [
        'inspector_id',
        'property_code',
        'rating_date',
        'property_description',
        'property_address',
        'contract_id',
        'date',
        'property_type',
        'infrastructure',
        'services',
        'property_age',
        'state',
        'number',
        'area_number',
        'source',
        'restriction_type',
        'distance',
        'north_latitude',
        'north_longitude',
        'south_latitude',
        'south_longitude',
        'east_latitude',
        'east_longitude',
        'west_latitude',
        'west_longitude',
        'inside_area',
        'attributed',
        'building_state',
        'finishing_description',
        'floor_number',
        'land_evaluation',
        'buildings_evaluation',
        'property_total_cost',
        'market_value',
        'property_comparison',
        'conflict',
        'measurement',
        'inspection',
        'notes',
        ];
}
