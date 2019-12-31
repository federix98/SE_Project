<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teaching_type extends Model
{
    protected $guarded = [];

    public function degreeTeachings()
    {
        return $this->hasMany('App\Degree_teaching');
    }
}
