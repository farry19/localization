<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pair;
use Faker\Generator as Faker;

$factory->define(Pair::class, function (Faker $faker) {
    return [
        'key'			=> $faker->word,
        'value'			=> $faker->word,
        'language_id'	=> 1
    ];
});
