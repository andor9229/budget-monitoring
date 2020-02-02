<?php

namespace App\Models\Saving;

use App\Models\Account\Account;
use App\Models\Goal\Goal;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function goals()
    {
        return $this->hasMany(Goal::class);
    }

    public function getTotal()
    {
        return $this->amount;
    }

    public function getRealSaving()
    {
        return $this->getTotal() - ($this->goals()->sum('percentage') * $this->getTotal() / 100);
    }

    public function getGoals()
    {
        return $this->getTotal() - $this->getRealSaving();
    }
}
