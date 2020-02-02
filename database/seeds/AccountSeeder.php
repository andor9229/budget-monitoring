<?php

use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $account = factory(\App\Models\Account\Account::class)->create([
            'name' => 'Personale',
            'user_id' => \App\User::first()->id,
            'currency_id' => App\Models\Currency\Currency::first()->id
        ]);

        \App\User::first()->select_account_id = $account->id;

        \App\User::first()->save();
    }
}
