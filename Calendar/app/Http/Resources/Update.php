<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Update extends JsonResource
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
            'teaching_id' => $this->teaching_id,
            'title' => $this->title,
            'info' => $this->info,
            'link' => $this->link,
        ];
    }
}
