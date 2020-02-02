<?php

/** @var Factory $factory */

use App\Models\Account\Account;
use App\User;
use App\Models\Currency\Currency;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => factory(User::class)->create()->id,
        'currency_id' => factory(Currency::class)->create()->id
    ];
});
