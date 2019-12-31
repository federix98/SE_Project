<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor_role extends Model
{
    protected $guarded = [];

    public function professors()
    {
        return $this->hasMany('App\Professor');
    }
}
