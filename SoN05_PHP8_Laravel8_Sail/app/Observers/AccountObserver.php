<?php

namespace App\Observers;

use App\Models\Account;

class AccountObserver
{
//  Eloquent provides a handful of events to monitor the model state which are:
//    retrieved : after a record has been retrieved.
//    creating : before a record has been created.
//    created : after a record has been created.
//    updating : before a record is updated.
//    updated : after a record has been updated.
//    saving : before a record is saved (either created or updated).
//    saved : after a record has been saved (either created or updated).
//    deleting : before a record is deleted or soft-deleted.
//    deleted : after a record has been deleted or soft-deleted.
//    restoring : before a soft-deleted record is going to be restored.
//    restored : after a soft-deleted record has been restored.

    /**
     * Handle the Account "created" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function creating(Account $account)
    {
        if (is_object($account->bank_image) && $account->bank_image->isValid()) {
            $filename = $account->bank_image->getClientOriginalName();
            $account->bank_image->storeAs('images', $filename);
            $account->bank_image = $filename;
        }
    }
}
