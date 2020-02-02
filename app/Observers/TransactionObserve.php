<?php

namespace App\Observers;

use App\Models\Transaction\Transaction;

class TransactionObserve
{
    /**
     * Handle the transaction "created" event.
     *
     * @param  Transaction $transaction
     * @return void
     */
    public function created(Transaction $transaction)
    {
        //
    }


}
