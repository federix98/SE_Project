<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Lesson extends JsonResource
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
            //'classroom_id' => $this->classroom_id,
            'classroom_name' => $this->classroom->name,
            'teaching' => $this->teaching->name,
            'start_time' => $this->start_time,
            'duration' => $this->duration,
            'week_day' => $this->week_day,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ];
    }
}
