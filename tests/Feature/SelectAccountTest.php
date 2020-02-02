<?php

namespace Tests\Feature;

use App\Models\Account\Account;
use App\Models\Account\SelectAccount;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SelectAccountTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function selectAccountTest()
    {
        $user = factory(User::class)->create();
        $account = factory(Account::class)->create([
            'user_id' => $user->id
        ]);
        $account1 = factory(Account::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($account->user);

        $this->get('/account/' . $account->id . '/select');

        $this->assertDatabaseHas('users', [
            'select_account_id' => $account->id
        ]);

        $this->assertDatabaseMissing('users', [
            'select_account_id' => $account1->id
        ]);

        $this->get('/account/' . $account1->id . '/select');
        $this->assertDatabaseMissing('users', [
            'select_account_id' => $account->id
        ]);

        $this->assertDatabaseHas('users', [
            'select_account_id' => $account1->id
        ]);
    }

    /** @test */
    public function if_user_not_select_account_redirect_to_select_account()
    {
        $user = factory(User::class)->create();
        $account = factory(Account::class)->create([
            'user_id' => $user->id
        ]);

        $this->actingAs($account->user);

        $this->get(route('dashboard'))
            ->assertRedirect(route('account.select.index'));

        $this->get('/account/' . $account->id . '/select');

        $this->get(route('dashboard'))
            ->assertOk();
    }
}
