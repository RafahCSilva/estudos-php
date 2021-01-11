<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\User;
use App\Observers\AccountObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        \Illuminate\Cache\Events\CacheHit::class => [
            \App\Listeners\EstudosCache\LogCacheHit::class
        ],

        \Illuminate\Cache\Events\CacheMissed::class => [
            \App\Listeners\EstudosCache\LogCacheMissed::class
        ],

        \Illuminate\Cache\Events\KeyForgotten::class => [
            \App\Listeners\EstudosCache\LogKeyForgotten::class
        ],

        \Illuminate\Cache\Events\KeyWritten::class => [
            \App\Listeners\EstudosCache\LogKeyWritten::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Account::observe(AccountObserver::class);
        User::observe(UserObserver::class);
    }
}
