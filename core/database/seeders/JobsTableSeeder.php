<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('jobs')->insert([
            'user_id' => 1,
            'status' => 'active',
            'position' => 'back-end',
        ]);

        \DB::table('jobs')->insert([
            'user_id' => 1,
            'status' => 'inactive',
            'position' => 'front-end',
        ]);
    }
}
