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
            'description' => $this->getShortDescription(),
            'type' => $this->type,
            'area' => $this->area,
            'longitude' => $this->area,
            'latitude' => $this->area,
            'image' => $this->images->isNotEmpty() ? $this->images->first()->path : null // Include only the first image path
        ];
    }

        protected function getShortDescription($length = 100): string
        {
            return substr($this->description, 0, $length) . (strlen($this->description) > $length ? '...' : '');
        }
    
}
