<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'property' => $this->property ? [
                'id' => $this->property->id,
                'address' => $this->property->address,
                'short_description' => $this->getShortDescription(100),
                'price' => $this->property->price,
                'city' => $this->property->city,
                'region' => $this->property->region,
                'images' => $this->property->images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'path' => $image->path,
                    ];
                }),
            ] : null,
            'company' => $this->company ? $this->company->only(['id', 'username', 'email', 'phone']) : null,
            'inspector' => $this->inspector ? $this->inspector->only(['id', 'username', 'email', 'phone']) : null,
        ];
    }

    /**
     * Shortens the description to a specific length.
     *
     * @param int $length
     * @return string
     */
    protected function getShortDescription($length = 100): string
    {
        $description = $this->property->description ?? '';
        return substr($description, 0, $length) . (strlen($description) > $length ? '...' : '');
    }
}