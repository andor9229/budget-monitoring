<?php

/** @var Factory $factory */

use App\Models\Currency\Currency;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'name' => $faker->currencyCode,
        'symbol' => $faker->currencyCode,
    ];
});
