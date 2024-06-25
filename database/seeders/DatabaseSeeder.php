<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;




class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(userSeeder::class);
        
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([ 
            ['name'=>'QuangThai','email'=>str::random(3).'@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'Laravel','email'=>str::random(3).'@gmail.com','password'=>bcrypt('matkhau')],
            ['name'=>'PHP','email'=>str::random(3).'@gmail.com','password'=>bcrypt('matkhau')]
            ]);
    }
}

