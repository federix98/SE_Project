<?php

namespace App\Observers;

use App\Special_event;

class Special_eventObserver
{
    /**
     * Handle the special_event "created" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function created(Special_event $specialEvent)
    {
        //
    }

    /**
     * Handle the special_event "updated" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function updated(Special_event $specialEvent)
    {
        //
    }

    /**
     * Handle the special_event "deleted" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function deleted(Special_event $specialEvent)
    {
        //
    }

    /**
     * Handle the special_event "restored" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function restored(Special_event $specialEvent)
    {
        //
    }

    /**
     * Handle the special_event "force deleted" event.
     *
     * @param  \App\Special_event  $specialEvent
     * @return void
     */
    public function forceDeleted(Special_event $specialEvent)
    {
        //
    }
}
