<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Degree_teaching;

class Teaching extends Model
{
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    public function updates()
    {
        return $this->hasMany('App\Update');
    }

    public function extraLessons()
    {
        return $this->hasMany('App\ExtraLesson');
    }

    public function lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function professors()
    {
        return $this->belongsToMany('App\Professor');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function degrees()
    {
        return $this->belongsToMany('App\Degree')->using('App\DegreeTeaching')
        ->withPivot([
            'teaching_type_id'
        ]);
    }

    public function getType( $degree_id ) // torna il tipo dellla lezione
    {
        return DegreeTeaching::where('degree_id', '=', $degree_id )->where('teaching_id','=', $this->id )
        ->get()->first()['teaching_type_id'];  
    }
}
