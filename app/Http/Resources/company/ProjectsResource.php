<?php

namespace App\Http\Resources\company;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
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
            'property' => new PropertiesResource($this->property),
        ];
    }

    /**
     * Shortens the description to a specific length.
     *
     * @param int $length
     * @return string
     */
    

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