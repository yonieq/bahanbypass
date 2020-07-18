<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JalurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
 		$status = ['buka', 'tutup'];
    	for($i = 1; $i <= 100; $i++){
 
    	    // insert data ke table menggunakan Faker
    		DB::table('jalurs')->insert([
    			'nama' => $faker->streetName,
    			'lokasi' => $faker->city,
    			'estimasi' => $faker->numberBetween(8,12).' jam',
    			'jumlah_pos' => $faker->numberBetween(6,10),
    			'status' => $faker->randomElement($status),
                'created_at' => now(),
                'updated_at' => now()
    		]);
 
    	}
    }
}
