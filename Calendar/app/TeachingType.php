<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeachingType extends Model
{
    protected $guarded = [];

    public function degreeTeachings()
    {
        return $this->hasMany('App\DegreeTeaching');
    }
}
