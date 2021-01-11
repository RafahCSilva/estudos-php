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

        /**
         *  Eloquent provides a handful of events to monitor the model state which are:
         * @see \Illuminate\Database\Eloquent\Concerns\HasEvents::getObservableEvents()
         * 'retrieved', 'creating', 'created', 'updating', 'updated',
         * 'saving', 'saved', 'restoring', 'restored', 'replicating',
         * 'deleting', 'deleted', 'forceDeleted',
         */

        // Antes de fazer o INSERT no Banco
        User::creating(function ($user) {
            \Log::info("User {$user->email} creating");
        });
        // Apos fazer o INSERT
        User::created(function ($user) {
            \Log::info("User {$user->email} created");
        });

        // Antes de fazer o UPDATE no Banco
        User::updating(function ($user) {
            \Log::info("User {$user->email} updating");
        });
        // Apos fazer o UPDATE
        User::updated(function ($user) {
            \Log::info("User {$user->email} updated");
        });

        // Antes de salvar (caso queira a mesma ação para creating e updating)
        User::saving(function ($user) {
            \Log::info("User {$user->email} saving");
        });
        // Apos de salvar (caso queira a mesma ação para creating e updating)
        User::saved(function ($user) {
            \Log::info("User {$user->email} saved");
        });
    }
}
