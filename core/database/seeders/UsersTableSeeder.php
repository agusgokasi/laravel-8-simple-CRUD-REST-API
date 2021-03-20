<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'Admin Backend',
            'email' => 'back@mail.com',
            'password' => bcrypt('12345678'),
        ]);

        \DB::table('users')->insert([
            'name' => 'Admin Frontend',
            'email' => 'front@mail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
