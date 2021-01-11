<?php

namespace App\Listeners;

use App\Events\UserRegisteredEvent;
use App\Mail\UserRegisteredMail;

class UserRegisteredListener
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
     * @param  UserRegisteredEvent  $event
     * @return void
     */
    public function handle(UserRegisteredEvent $event): void
    {
        // Disparo do Email a partir de um Observer do Evento created do Eloquent
        $user = $event->getUser();
        \Mail::to($user)->send(new UserRegisteredMail($user));
        \Log::info("User {$user->email} email enviado by Listener!");
    }
}
