<?php

namespace Tests\Feature;

use App\Jobs\PaidTransactions;
use App\Models\Account\Account;
use App\Models\Category\Category;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionType;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Bus;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;
    /** @test */
    public function transactionBelongsToCategory()
    {
        $category = factory(Category::class)->create();

        $transaction = factory(Transaction::class)->create([
            'category_id' => $category->id,
        ]);

        $this->assertTrue($category->id === $transaction->category->id);
        $this->assertTrue($category->account->name === $transaction->category->account->name);
    }

    /** @test */
    public function paidTransactionNowDefault()
    {
        $transaction = factory(Transaction::class)->create();
        $this->assertTrue($transaction->paid);
        $this->assertTrue($transaction->paidOn->toDateString() === now()->toDateString());
    }

    /** @test */
    public function automaticallyPaidTransactionOnDatePaidOn()
    {
        $transaction = factory(Transaction::class)->create([
            'paid' => false,
            'paidOn' => now()
        ]);
        $this->assertTrue(!$transaction->paid);

        PaidTransactions::dispatch();

        $this->assertTrue($transaction->fresh()->paid);

    }


}
