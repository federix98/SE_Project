<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    public function building()
    {
        return $this->belongsTo('App\Building');
    }

    public function extraLessons()
    {
        return $this->hasMany('App\ExtraLesson');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }
    
    public function specialEvents()
    {
        return $this->hasMany('App\SpecialEvent');
    }

}
