<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'user_role_id' => $this->user_role_id,
            'degree_id' => $this->degree_id,
            'name' => $this->name,
            'surname' => $this->surname,
            'matric_no' => $this->matric_no,
            'email' => $this->email,
            'password' => $this->password,
            'personal_calendar' => $this->personal_calendar,
            'LAU' => $this->LAU
        ];
    }
}
