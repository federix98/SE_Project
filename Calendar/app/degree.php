<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded = [];
    protected $visible = ['id', 'degree_group_id', 'name', 'year', 'SSD'];

    public function degreeGroup() {
        return $this->belongsTo('App\Degree_group');
    }

    public function users() {
        return $this->hasMany('App\User');
    }

    public function specialEvents()
    {
        return $this->belongsToMany('App\Special_event');
    }

    public function teachings()
    {
        return $this->belongsToMany('App\Teaching');
    }
}
