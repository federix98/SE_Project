<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo('App\Professor_role','professor_role_id');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function teachings()
    {
        return $this->hasMany('App\Teaching');
    }
}
