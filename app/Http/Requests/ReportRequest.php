<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'property_code' => 'required|string|max:255',
            'rating_date' => 'required|date',
            'property_description' => 'required|string',
            'property_address' => 'required|string',
            'contract_id' => 'required|string|max:255',
            'date' => 'required|date',
            'property_type' => 'required|string|max:255',
            'infrastructure' => 'required|string',
            'services' => 'required|string',
            'property_age' => 'required|integer|min:0',
            'state' => 'required|string',
            'number' => 'required|integer|min:0',
            'area_number' => 'required|integer|min:0',
            'source' => 'required|string',
            'restriction_type' => 'required|string',
            'distance' => 'required|integer|min:0',
            'north_latitude' => 'required|string|max:255',
            'north_longitude' => 'required|string|max:255',
            'south_latitude' => 'required|string|max:255',
            'south_longitude' => 'required|string|max:255',
            'east_latitude' => 'required|string|max:255',
            'east_longitude' => 'required|string|max:255',
            'west_latitude' => 'required|string|max:255',
            'west_longitude' => 'required|string|max:255',
            'inside_area' => 'required|string|max:255',
            'attributed' => 'required|string|max:255',
            'building_state' => 'required|string|max:255',
            'finishing_description' => 'required|string',
            'floor_number' => 'required|integer|min:0',
            'land_evaluation' => 'required|string|max:255',
            'buildings_evaluation' => 'required|string|max:255',
            'property_total_cost' => 'required|numeric|min:0',
            'market_value' => 'required|numeric|min:0',
            'property_comparison' => 'required|string',
            'conflict' => 'required|string',
            'measurement' => 'required|string|max:255',
            'inspection' => 'required|string|max:255',
            'notes' => 'required|string',
        ];
    }
}
