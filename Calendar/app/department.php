<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    protected $visible = ['id', 'name'];

    public function professors()
    {
        return $this->hasMany('App\Professor');
    }

    public function degreeGroups()
    {
        return $this->hasMany('App\Degree_group');
    }
}
