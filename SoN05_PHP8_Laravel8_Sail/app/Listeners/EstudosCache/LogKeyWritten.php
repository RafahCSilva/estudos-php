<?php

namespace App\Listeners\EstudosCache;

class LogKeyWritten
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
     * @param  \Illuminate\Cache\Events\KeyWritten  $event
     * @return void
     */
    public function handle(\Illuminate\Cache\Events\KeyWritten $event)
    {
        $value = print_r($event->value, true);
        \Log::info("Cache foi escrito [{$event->key}]=[{$value}]");
    }
}
