<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Professor as ProfessorResource;

class Teaching extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'CFU' => $this->CFU,
            'semester' => $this->semester,
            'language' => $this->language,
            'professors' => ProfessorResource::collection($this->professors),
        ];
    }
}
