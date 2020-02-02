<?php

namespace App\Http\Controllers;

use App\Models\Account\Account;
use App\Models\Account\SelectAccount;
use App\User;
use Illuminate\Http\Request;

class SelectAccountController extends Controller
{
    public function select(Account $account)
    {
        auth()->user()->select_account_id = $account->id;

        auth()->user()->save();

        return redirect(route('dashboard'));
    }
}
