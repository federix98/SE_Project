<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $guarded = [];

    public function classrooms()
    {
        return $this->hasMany('App\Classroom');
    }
}
