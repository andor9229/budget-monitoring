<?php

/** @var Factory $factory */

use App\Models\Goal\Goal;
use App\Models\Saving\Saving;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'percentage' => $faker->randomFloat(2,0,100),
        'amount' => $faker->randomFloat(2),
        'saving_id' => factory(Saving::class)->create()->id
    ];
});
