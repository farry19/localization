<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Language;
use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
    return [
        'name'				=> $faker->word,
        'short_name'		=> $faker->word,
        'text_direction'	=> $faker->word,
        'text_align'		=> $faker->word,
        'flex_direction'	=> $faker->word,
    ];
});
