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
        	'name' => 'pelayan',
        	'role' => 'pelayan',
        	'email' => 'pelayan@pelayan.com',
        	'password' => bcrypt('pelayan')
        ]);
        DB::table('users')->insert([
        	'name' => 'kasir',
        	'role' => 'kasir',
        	'email' => 'kasir@kasir.com',
        	'password' => bcrypt('kasir')
        ]);
    }
}
