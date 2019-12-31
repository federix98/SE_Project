<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree_group extends Model
{
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function degrees()
    {
        return $this->hasMany('App\Degree');
    }
}
