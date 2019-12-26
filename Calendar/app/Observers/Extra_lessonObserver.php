<?php

namespace App\Observers;

use App\Extra_lesson;

class Extra_lessonObserver
{
    /**
     * Handle the extra_lesson "created" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function created(Extra_lesson $extraLesson)
    {
        //
    }

    /**
     * Handle the extra_lesson "updated" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function updated(Extra_lesson $extraLesson)
    {
        //
    }

    /**
     * Handle the extra_lesson "deleted" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function deleted(Extra_lesson $extraLesson)
    {
        //
    }

    /**
     * Handle the extra_lesson "restored" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function restored(Extra_lesson $extraLesson)
    {
        //
    }

    /**
     * Handle the extra_lesson "force deleted" event.
     *
     * @param  \App\Extra_lesson  $extraLesson
     * @return void
     */
    public function forceDeleted(Extra_lesson $extraLesson)
    {
        //
    }
}
