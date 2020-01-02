<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Extra_lesson extends JsonResource
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
            'teaching_id' => $this->teaching_id,
            'start_time' => $this->start_time,
            'duration' => $this->duration,
            'date_lesson' => $this->date_lesson,
        ];
    }
}
