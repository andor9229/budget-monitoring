<?php

/** @var Factory $factory */

use App\Models\Transaction\Transaction;
use App\Models\Account\Account;
use App\Models\Category\Category;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Arr;

use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'amount' => $faker->randomFloat(2),
        'payee' => $faker->company,
        'paid' => true,
        'paidOn' => now(),
        'category_id' => factory(Category::class)->create()->id,
        'transaction_type' => Arr::random(Transaction::TYPES)
    ];
});
