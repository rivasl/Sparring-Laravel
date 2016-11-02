<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\User::class)->create([
    		'first_name' 	=> 'Luis',
    		'last_name' 	=> 'Rivas',
    		'role'		 	=> 'admin',
    		'password'		=> 'secreto',
    		'email'			=> 'email'
    	]);

        factory(App\User::class, 10)->create();
    }
}
