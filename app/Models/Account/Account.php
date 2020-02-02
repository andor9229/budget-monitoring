<?php

namespace App\Models\Account;

use App\Models\Currency\Currency;
use App\Models\Goal\Goal;
use App\Models\Transaction\Transaction;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'count_expense_from',
        'user_id',
        'currency_id'
    ];
    protected $dates = ['count_expense_from'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getSaving()
    {
        $entry =  Transaction::where('account_id', $this->id)->where('transaction_type', 'entrata')->sum('amount');
        $exit =  Transaction::where('account_id', $this->id)->where('transaction_type', 'uscita')->sum('amount');
        return $entry - $exit;
    }

    public function getSavingsWithGoals()
    {
        $savings =  $this->getSaving();
        $totalPercentage = Goal::where('account_id', $this->id)->sum('percentage');
        return $savings - ($savings * $totalPercentage / 100);
    }
}
