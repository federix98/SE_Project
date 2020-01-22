<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DegreeGroup extends Model
{
    protected $guarded = [];
    protected $visible = ['id', 'name'];
    
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function degrees()
    {
        return $this->hasMany('App\Degree');
    }
}
