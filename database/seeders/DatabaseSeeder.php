<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'name' => 'xip',
            'email' => 'bahiaxip@hotmail.com',
            'password' => bcrypt('cali'),
            'code' =>'active'
        ]);
        
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            //PostSeeder::class
        ]);
    }
}
