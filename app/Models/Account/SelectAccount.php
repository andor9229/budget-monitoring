<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class SelectAccount extends Model
{
    protected $table = 'selected_accounts';
    protected $fillable = ['user_id', 'account_id'];
}
