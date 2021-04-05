<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        	[
        		'name'=> 'admin',
        		'email'=>	'admin@admin.com',
        		'password'=> bcrypt('password'),
        	],
        	[
        		'name'=>'user',
        		'email'=>'user@gmail.com',
        		'password'=>bcrypt('user'),
        	]
        ]);
    }
}
