<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(12345678),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $this->call(JalurSeeder::class);
        $this->call(PerlengkapanSeeder::class);
        $this->call(ReguSeeder::class);
        $this->call(PendakianSeeder::class);
    }
}
