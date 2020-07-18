<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Regu;
use Faker\Generator as Faker;

$factory->define(Regu::class, function (Faker $faker) {

    return [
        'regu' => $faker->word,
        'jumlah_anggota' => $faker->word,
        'jalur_id' => $faker->word,
        'foto' => $faker->word,
        'file' => $faker->word
    ];
});
