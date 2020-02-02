<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $from = auth()->user()->account->count_expense_from;
        $dashboard = (object) [
            'from' => $from->format('d-m-Y'),
            'entry' => Transaction::where('transaction_type', 'entry')->whereDate('created_at', $from)->sum('amount'),
            'exit' =>  Transaction::where('transaction_type', 'exit')->whereDate('created_at', $from)->sum('amount'),
            'savings' => '',
            'bank' => '',
        ];

        return view('dashboard', compact('dashboard'));
    }
}
