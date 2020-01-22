<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DegreeTeaching extends Pivot
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\Teaching_type','teaching_type_id');
    }
}
