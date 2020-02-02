<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View;
     */
    public function index()
    {
        return view('pages.account.index')
            ->with('accounts', Account::where('user_id', auth()->user()->id)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AccountRequest  $request
     * @return View
     */
    public function store(AccountRequest $request)
    {
        Account::create([
            'name' => Str::lower($request->name),
            'amount' => $request->amount,
            'count_expense_from' => now(),
            'user_id' => auth()->user()->id,
            'currency_id' => $request->currency_id
        ]);

        Session::flash('status', 'Account creato correttamente!');
        return view('pages.account.index')
            ->with('accounts', Account::where('user_id', auth()->user()->id)->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }

    public function updateCountExpenseFrom(Account $account)
    {
        $account->count_expense_from = now();
        $account->save();

        return $account;
    }

    public function indexSelect()
    {
        return view('pages.account.selected_account')
            ->with('accounts', Account::where('user_id', auth()->user()->id)->get());
    }

}
