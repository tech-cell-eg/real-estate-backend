<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'region' => $this->region,
            'city' => $this->city,
            'price' => $this->price,
            'description' => $this->getShortDescription(100),
            'type' => $this->type,
            'area' => $this->area,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'image' => $this->images->isNotEmpty() ? $this->images->first()->path : null // Include only the first image path
        ];
    }




    public static function addPaginationMeta($paginated)
    {
        return [
            'current_page' => $paginated->currentPage(),
            'last_page' => $paginated->lastPage(),
            'per_page' => $paginated->perPage(),
            'total' => $paginated->total(),
        ];
    }
}
