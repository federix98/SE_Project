<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DegreeTeaching extends Pivot
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo('App\TeachingType','teaching_type_id');
    }
}
