<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class Professor extends JsonResource
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
            'professor_role_id' => $this->professor_role_id,
            'role' => $this->role->name,
            'department_id' => $this->department_id,
            'department' => $this->department->name,
            'name' => $this->name,
            'surname' => $this->surname,
            'office_address' => $this->office_address,
            'email' => $this->email,
            'telephone_no' => $this->telephone_no,
            'office_hours' => $this->office_hours,
        ];
    }
}
