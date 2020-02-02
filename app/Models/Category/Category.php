<?php

namespace App\Models\Category;

use App\Models\Account\Account;
use App\Models\Transaction\Transaction;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'account_id'
    ];


    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getExitTransactions()
    {
        return $this
            ->transactions()
            ->where('transaction_type', 'exit')
            ->whereDate('created_at', '>=', auth()->user()->account->count_expense_from->toDateString())
            ->sum('amount');
    }
}
