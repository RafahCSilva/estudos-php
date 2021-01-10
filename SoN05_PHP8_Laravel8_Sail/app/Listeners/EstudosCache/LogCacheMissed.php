<?php

namespace App\Listeners\EstudosCache;

class LogCacheMissed
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
     * @param  \Illuminate\Cache\Events\CacheMissed  $event
     * @return void
     */
    public function handle(\Illuminate\Cache\Events\CacheMissed $event)
    {
        \Log::info("Cache nao encontrado [{$event->key}]");
    }
}
