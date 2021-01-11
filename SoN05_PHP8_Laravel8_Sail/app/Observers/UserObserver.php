<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     *  Eloquent provides a handful of events to monitor the model state which are:
     * @see \Illuminate\Database\Eloquent\Concerns\HasEvents::getObservableEvents()
     * 'retrieved', 'creating', 'created', 'updating', 'updated',
     * 'saving', 'saved', 'restoring', 'restored', 'replicating',
     * 'deleting', 'deleted', 'forceDeleted',
     */

    // Antes de fazer o INSERT no Banco
    public function creating(User $user): void
    {
        \Log::info("User {$user->email} creating");
    }

    // Apos fazer o INSERT
    public function created(User $user): void
    {
        \Log::info("User {$user->email} created");
    }

    // Antes de fazer o UPDATE no Banco
    public function updating(User $user): void
    {
        \Log::info("User {$user->email} updating");
    }

    // Apos fazer o UPDATE
    public function updated(User $user): void
    {
        \Log::info("User {$user->email} updated");
    }

    // Antes de salvar (caso queira a mesma ação para creating e updating)
    public function saving(User $user): void
    {
        \Log::info("User {$user->email} saving");
    }

    // Apos de salvar (caso queira a mesma ação para creating e updating)
    public function saved(User $user): void
    {
        \Log::info("User {$user->email} saved");
    }
}
