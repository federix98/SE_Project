<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Canceled_lesson extends JsonResource
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
            'date_lesson' => $this->date_lesson,
        ];
    }
}
