<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\Canceled_lessonObserver;

class Canceled_lesson extends Model
{
    protected $dispatchesEvents = [
        'created' => Canceled_lessonObserver::class,
        'deleted'  => Canceled_lessonObserver::class,
    ];

    protected $guarded = [];
}
