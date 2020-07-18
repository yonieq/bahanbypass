<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PerlengkapanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $cek = ['ada', 'tidak'];
        static $angka = 1;
    	for($i = 1; $i <= 100; $i++){
 
    	    // insert data ke table menggunakan Faker
    		DB::table('perlengkapans')->insert([
    			'regu_id' => $angka++,
                'navigasi' => $faker->randomElement($cek),
                'created_at' => now(),
                'updated_at' => now()
    		]);
    	}
    }
}
