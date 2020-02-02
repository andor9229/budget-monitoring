<?php

namespace Tests\Feature;

use App\Models\Account\Account;
use App\Models\Currency\Currency;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /** @test */
    public function accountBelongsToUser()
    {
        $user = factory(User::class)->create();
        $currency = factory(Currency::class)->create();
        $account = factory(Account::class)->create([
            'user_id' => $user->id,
            'currency_id' => $currency->id,
        ]);

        $this->assertTrue($account->user->name === $user->name);
    }

    /** @test */
    public function accountBelongsToCurrency()
    {
        $user = factory(User::class)->create();
        $currency = factory(Currency::class)->create();
        $account = factory(Account::class)->create([
            'user_id' => $user->id,
            'currency_id' => $currency->id,
        ]);

        $this->assertTrue($account->currency->name === $currency->name);
    }

    /** @test */
    public function whenNewEntryStartCountFrom()
    {
        $account = factory(Account::class)->create([
            'count_expense_from' => now()->subWeek()
        ]);

       $this->get('/api/account/' . $account->id . '/update-count-expanse-from');

        $this->assertTrue($account->fresh()->count_expense_from->toDateString() === now()->toDateString());
    }
}
