<?php

/** @var Factory $factory */

use App\Models\Account\Account;
use App\Models\Saving\Saving;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Saving::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'amount' => $faker->randomFloat(2),
        'account_id' => factory(Account::class)->create()->id
    ];
});
