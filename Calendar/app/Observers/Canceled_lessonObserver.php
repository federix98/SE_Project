<?php

namespace App\Observers;

use App\Canceled_lesson;

class Canceled_lessonObserver
{
    /**
     * Handle the canceled_lesson "created" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function created(Canceled_lesson $canceledLesson)
    {
        //
    }

    /**
     * Handle the canceled_lesson "updated" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function updated(Canceled_lesson $canceledLesson)
    {
        //
    }

    /**
     * Handle the canceled_lesson "deleted" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function deleted(Canceled_lesson $canceledLesson)
    {
        //
    }

    /**
     * Handle the canceled_lesson "restored" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function restored(Canceled_lesson $canceledLesson)
    {
        //
    }

    /**
     * Handle the canceled_lesson "force deleted" event.
     *
     * @param  \App\Canceled_lesson  $canceledLesson
     * @return void
     */
    public function forceDeleted(Canceled_lesson $canceledLesson)
    {
        //
    }
}
