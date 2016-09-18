<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
                'name' => 'wosjohn',
                'email' => 'wosjohn@foxmail.com',
                'password' => bcrypt('123456'),
                'api_token' => api_token(),
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);
    }
}
