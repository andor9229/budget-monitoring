<?php

namespace App\Models\Goal;

use App\Models\Account\Account;
use App\Models\Saving\Saving;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    protected $fillable = [
        'name',
        'percentage',
        'amount',
        'expire_at',
        'account_id'
    ];

    protected $dates = [
        'expire_at'
    ];

    public function getPercentage()
    {
        return $this->account->getSaving() * $this->percentage / 100;
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }


}
