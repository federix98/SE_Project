<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observers\Extra_lessonObserver;

class Extra_lesson extends Model
{
    protected $dispatchesEvents = [
        'created' => Extra_lessonObserver::class,
        'deleted'  => Extra_lessonObserver::class,
    ];

    protected $guarded = [];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function teaching()
    {
        return $this->belongsTo('App\Teaching');
    }


}
