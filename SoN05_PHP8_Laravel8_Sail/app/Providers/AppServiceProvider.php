<?php

namespace App\Providers;

use App\Mail\UserRegistered;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function ($user) {
            // Disparo do Email a partir de um Observer do Evento created do Eloquent
            \Mail::to($user)->send(new UserRegistered($user));
            \Log::info("User {$user->email} email enviado!");
        });
    }
}
