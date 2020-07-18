<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class PendakianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        static $angka = 1;
        for($i = 1; $i <= 100; $i++){

			DB::table('pendakians')->insert([
				'nama' => $faker->name,
				'alamat' => $faker->address,
				'regu_id' => $angka++,
				'tanggal_mendaki' => $faker->date,
				'created_at' => now(),
				'updated_at' => now()
        ]);
    }
}
}
