<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialEvent extends JsonResource
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
            'classroom_id' => $this->classroom_id,
            'name' => $this->name,
            'date_event' => $this->date_event,
            'start_time' => $this->start_time,
            'duration' => $this->duration,
            'info' => $this->info,
            'degrees' => $this->degrees
        ];
    }
}
