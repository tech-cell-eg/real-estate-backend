<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaidProjectsResource extends JsonResource
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
            'property' => new PropertiesResource($this->property),

        ];
    }
}
