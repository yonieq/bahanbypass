<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pendaki;
use Faker\Generator as Faker;

$factory->define(Pendaki::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'alamat' => $faker->text,
        'regu_id' => $faker->word,
        'tanggal_mendaki' => $faker->word,
        'foto' => $faker->word,
        'file' => $faker->word
    ];
});
