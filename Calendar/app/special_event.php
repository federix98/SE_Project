<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\Special_eventObserver;

class Special_event extends Model
{
    protected $dispatchesEvents = [
        'created' => Special_eventObserver::class,
        'deleted'  => Special_eventObserver::class,
    ];
    
    protected $guarded = [];
}
