<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Jalur;
use Faker\Generator as Faker;

$factory->define(Jalur::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'lokasi' => $faker->word,
        'estimasi' => $faker->word,
        'jumlah_pos' => $faker->word,
        'status' => $faker->word,
        'foto' => $faker->word,
        'file' => $faker->word
    ];
});
