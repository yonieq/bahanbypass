<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReguSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $regu = ['Macan', 'Harimau', 'Elang', 'Serigala', 'Rusa', 'Kuda', 'Semut'];
        static $angka = 1;
    	for($i = 1; $i <= 100; $i++){
 
    	    // insert data ke table menggunakan Faker
    		DB::table('regus')->insert([
    			'regu' => $faker->randomElement($regu),
    			'jumlah_anggota' => $faker->numberBetween(1,25),
                'jalur_id' => $angka++,
                'created_at' => now(),
                'updated_at' => now()
    		]);
    	}
    }
}
