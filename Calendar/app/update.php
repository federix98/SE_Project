<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $guarded = [];

    public function teaching()
    {
        return $this->belongsTo('App\Teaching');
    }

}
