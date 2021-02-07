<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 		=> 'admin',
            'email' 	=> 'admin@site.com',
            'role' 		=> 'admin',
            'phone' 	=> '80000000000',
            'password' 	=> Hash::make('password'),
        ]);
    }
}
