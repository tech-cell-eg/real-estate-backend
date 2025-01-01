<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AllProjectsResorce extends JsonResource
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
                'description' => $this->getShortDescription(100), // Use the custom method to shorten the description
                'price' => $this->property->price,
                'city' => $this->property->city,
                'region' => $this->property->region,
                'images' => $this->property->images->map(function ($image) {
                    return [
                        'id' => $image->id,
                        'path' => $image->first()->path, 
                    ];
                }),
            ],
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

    /**
     * Add pagination meta data.
     *
     * @param $paginated
     * @return array
     */
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