<?php

namespace App\Listeners\EstudosCache;

class LogCacheHit
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
     * @param  \Illuminate\Cache\Events\CacheHit  $event
     * @return void
     */
    public function handle(\Illuminate\Cache\Events\CacheHit $event)
    {
        $value = print_r($event->value, true);
        \Log::info("Cache foi acionado [{$event->key}]=[{$value}]");
    }
}
