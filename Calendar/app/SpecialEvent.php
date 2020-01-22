<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\Special_eventObserver;

class SpecialEvent extends Model
{
    protected $dispatchesEvents = [
        'created' => Special_eventObserver::class,
        'deleted'  => Special_eventObserver::class,
    ];
    
    protected $guarded = [];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    
    public function degrees()
    {
        return $this->belongsToMany('App\Degree');
    }
}
