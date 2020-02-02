<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Currency\Currency::class)->create([
            'name' => 'EUR',
            'symbol' => '€',
        ]);
    }
}
