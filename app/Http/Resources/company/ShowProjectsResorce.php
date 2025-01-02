<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowProjectsResorce extends JsonResource
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
            'status' => $this->status,
            'property' => [
                'id' => $this->property->id,
                'address' => $this->property->address,
                'description' => $this->property->description,
                'price' => $this->property->price,
                'city' => $this->property->city,
                'region' => $this->property->region,
                'type'=>$this->property->type,
                'area'=>$this->property->area,
                'longitude'=>$this->property->longitude,
                'latitude'=>$this->property->latitude,

                'images' => $this->property->images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'path' => $image->path, 
                    ];
                }),
            ],
        ];
    }


}