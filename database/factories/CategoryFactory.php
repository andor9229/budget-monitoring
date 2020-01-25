<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'amount' => $faker->randomFloat(2)
    ];
});
