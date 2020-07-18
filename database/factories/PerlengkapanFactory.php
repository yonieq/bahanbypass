<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Perlengkapan;
use Faker\Generator as Faker;

$factory->define(Perlengkapan::class, function (Faker $faker) {

    return [
        'regu_id' => $faker->randomDigitNotNull,
        'navigasi' => $faker->word,
        'foto' => $faker->word,
        'file' => $faker->word
    ];
});
