<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\LessonObserver;

class Lesson extends Model
{
    protected $dispatchesEvents = [
        'created' => LessonObserver::class,
        'deleted'  => LessonObserver::class,
    ];
    
    protected $guarded = [];
}
