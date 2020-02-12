<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Classroom extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'building_id' => $this->building_id,
            'building' => $this->building->name,
            'name' => $this->name,
            'floor' => $this->floor,
            'directions' => $this->directions,
            'capacity' => $this->capacity,
            'accessibility' => $this->accessibility,
        ];
    }
}
