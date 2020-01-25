<?php

namespace App\Models\Account;

use App\Models\Currency\Currency;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
