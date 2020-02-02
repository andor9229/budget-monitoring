<?php

namespace App\Models\Transaction;

use App\Models\Account\Account;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const TYPES = [
        'entrata',
        'uscita'
    ];

    protected $fillable = [
        'amount',
        'payee',
        'paid',
        'category_id',
        'account_id',
        'transaction_type'
    ];

    protected $dates = [
        'paidOn',
        'date'
    ];

    protected $casts = [
        'paid' => 'boolean'
    ];

    public function getCategory()
    {
        return is_null($this->category) ? NULL : $this->category->name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
