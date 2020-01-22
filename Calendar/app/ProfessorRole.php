<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorRole extends Model
{
    protected $guarded = [];

    public function professors()
    {
        return $this->hasMany('App\Professor');
    }
}
