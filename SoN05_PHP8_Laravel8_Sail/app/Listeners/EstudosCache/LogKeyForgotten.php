<?php

namespace App\Listeners\EstudosCache;

class LogKeyForgotten
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Cache\Events\KeyForgotten  $event
     * @return void
     */
    public function handle(\Illuminate\Cache\Events\KeyForgotten $event)
    {
        \Log::info("Cache foi esquecido [{$event->key}]");
    }
}
