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

    public function canceledLesson()
    {
        return $this->hasOne('App\CanceledLesson');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function teaching()
    {
        return $this->belongsTo('App\Teaching');
    }

    public function isCanceled() // torna true se la lezione è stata cancellata
    {
        if( is_null( $this->canceledLesson )) return false;
        return true;
    }
}
