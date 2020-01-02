<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Degree_group extends JsonResource
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
            'department_id' => $this->department_id,
            'name' => $this->name,
        ];
    }
}
