<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ViewWeeklyLesson extends JsonResource
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
            'lesson_id' => $this->lesson_id,
            'teaching_id' => $this->teaching_id,
            'classroom_id' => $this->classroom_id,
            'week_day' => $this->week_day,
            'type' => $this->type,
            'canceled' => $this->canceled,
            'start_time' => $this->start_time,
            'duration' => $this->duration,
            'teaching_name' => $this->teaching_name,
            'classroom_name' => $this->classroom_name,
        ];
    }
}
