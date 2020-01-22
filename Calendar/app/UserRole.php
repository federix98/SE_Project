<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = [];

    public function Users()
    {
        return $this->hasMany('App\User');
    }
}
