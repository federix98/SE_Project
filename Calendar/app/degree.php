<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    protected $guarded = [];
    protected $hidden = ['id', 'created_at', 'updated_at'];

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
        return $this->belongsToMany('App\Teaching')->using('App\Degree_teaching')
        ->withPivot([
            'teaching_type_id'
        ]);
    }

    
}
