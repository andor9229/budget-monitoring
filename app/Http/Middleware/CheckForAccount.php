<?php

namespace App\Http\Middleware;

use App\Models\Account\Account;
use App\Models\Account\SelectAccount;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckForAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && is_null(auth()->user()->select_account_id)) {
            return redirect()->to(route('account.select.index'));
        }
        return $next($request);
    }
}
