<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Degree extends JsonResource
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
            'degree_group_id' => $this->degree_group_id,
            'name' => $this->name,
            'year' => $this->year,
            'SSD' => $this->SSD,
        ];
    }
}
